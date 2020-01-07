<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;
class ReservationController extends Controller
{
  public function __construct()

{
$this->middleware('auth');
$this->middleware('role:admin');
}
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  $reservations = Reservation::all();

  return view('admin.reservations.index')->with([
    'reservations' => $reservations
  ]);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
  $restaurants = Restaurant::all();
  $users = User::all();

    return view('admin.reservations.create')->with([
      'restaurants' => $restaurants,
      'users' => $users

    ]);

}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{

  $request->validate([
  'date' => 'required|max:191',
  'time' => 'required|max:191',
  'restaurant_id' => 'required|max:191',
  'party_size' => 'required|max:191'
]);

  $user = Auth::user();

  $reservation = new Reservation();
  $reservation->date = $request->input('date');
  $reservation->time = $request->input('time');
  $reservation->restaurant_id = $request->input('restaurant_id');
  $reservation->user_id = $user->id;
  $reservation->party_size = $request->input('party_size');
  $reservation->save();

  return redirect()->route('admin.reservations.index');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
  $reservation = Reservation::findOrFail($id);

  return view('admin.reservations.show')->with([
    'reservation' => $reservation
]);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
  $reservation = Reservation::findOrFail($id);

  return view('admin.reservations.edit')->with([
    'reservation' => $reservation,
]);
}
public function update(Request $request, $id)
  {
    return redirect()->route('admin.reservations.index');
  }

public function destroy($id)
  {
    $reservation = Reservation::findOrFail($id);

    $reservation->delete();

    return redirect()->route('admin.reservations.index');
  }
}
