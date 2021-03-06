<?php
//Review Controller

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Restaurant;
use App\User;
use App\Role;

class ReviewController extends Controller
{
  public function __construct()

{
$this->middleware('auth');
$this->middleware('role:user');
}
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

//Review Index
public function index()
{
  //Reviews doesnt have any code in index as it is on the restaurant show page instead
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */

//Review Create
public function create($id)
{
  $restaurant = Restaurant::findOrFail($id);

    return view('user.restaurants.reviews.create')->with([
      'restaurant' => $restaurant

    ]);
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */


//Review Store
public function store(Request $request, $id)
{
  //Setting Review Fields
  $review = new Review();
  $review->review = $request->input('review');
  $review->restaurant_id = $id;
  $review->user_id = Auth::id();

  $review->save();

  return redirect()->route('user.restaurants.show', $id);

  //Validating Review
  $request->validate([
  'review' => 'required|max:250',
]);
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

//Show Reviews
public function show($id)
{
  $reviews = Review::findOrFail($id);
  return view('user.restaurants.show')->with([
    'reviews' => $reviews

]);
}
}
