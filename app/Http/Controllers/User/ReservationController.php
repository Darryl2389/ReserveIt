<?php
//Reservation Controller
namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Reservation;
use App\Restaurant;
use App\User;
use App\Role;

class ReservationController extends Controller
{
  public function __construct()

{
$this->middleware('auth');
$this->middleware('role:user');
}

//Reservation Index
public function index()
{
  $user = Auth::user();
  //Only shows the reservations of the currently logged in user
  $reservations = Reservation::where('user_id',$user->id)->get();

  //Returns view to index.blade.php
  return view('user.reservations.index')->with([
    'reservations' => $reservations
  ]);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */

//Reservation Create
public function create()
{
  $restaurants = Restaurant::all();

    return view('user.reservations.create')->with([
      'restaurants' => $restaurants
    ]);
}
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */

 //Reservation Store
public function store(Request $request)
{
  //Form validation for store function
  $request->validate([
    'date' => 'required|max:191',
    'time' => 'required|max:191',
    'restaurant_id' => 'required|max:191',
    'party_size' => 'required|max:2'
]);

  //Setting values to go into database
  $user = \Auth::user();
  $reservation = new Reservation();
  $reservation->user_id = $user->id;
  $reservation->date = $request->input('date');
  $reservation->time = $request->input('time');
  $reservation->restaurant_id = $request->input('restaurant_id');
  $reservation->party_size = $request->input('party_size');

  //Old Restrict
  // $restrict = $reservation->where('user_id',$user->id)->where('restaurant_id',$reservation->restaurant_id)->count();

  //Getting the number of tables a restaurant can have
  $tables = DB::table('restaurants')
              ->where('id',$reservation->restaurant_id)
              ->pluck('table_cap');
              foreach ($tables as $table);

  //Getting the amount of reservations at a restaurant a certain date & time
  $time = DB::table('reservations')
              ->where('time',$reservation->time)
              ->where('date',$reservation->date)
              ->where('restaurant_id',$reservation->restaurant_id)
              ->count();

  //statement to ensure reservations doesnt exceed table number at certain time & date
  if ($time <= $table) {
     $reservation->save(); //Saves to the database

  //returns user to home page
  return redirect()->route('user.reservations.index');
}
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

//Reservation Store
public function show($id)
{
  $reservation = Reservation::findOrFail($id);
  $restaurant = Restaurant::findorFail($id);

  //Returns View with reservations & restaurants
  return view('user.reservations.show')->with([
    'reservation' => $reservation,
    'restaurant' => $restaurant

]);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

//Reservation Edit
public function edit($id)
{
  $restaurants = Restaurant::all();
  $reservation = Reservation::findOrFail($id);

  return view('user.reservations.edit')->with([
    'reservation' => $reservation,
    'restaurants' => $restaurants
]);

}

//Reservation Update
public function update(Request $request, $id)
{
  $reservation = Reservation::findOrFail($id);
  $user = \Auth::user();

  //Setting values to go into database
  $reservation->user_id = $user->id;
  $reservation->date = $request->input('date');
  $reservation->time = $request->input('time');
  $reservation->restaurant_id = $request->input('restaurant_id');
  $reservation->party_size = $request->input('party_size');
  $reservation->save();

  return redirect()->route('user.reservations.index');
}

//Reservation Delete
public function destroy($id)
{
  $reservation = Reservation::findOrFail($id);

  //Deletes Reservation
  $reservation->delete();

  return redirect()->route('user.home');
}
}
