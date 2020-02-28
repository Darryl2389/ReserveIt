<?php
//Restaurant Controller

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Review;
use Illuminate\Support\Facades\DB;
use JavaScript;

class RestaurantController extends Controller
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

//Restaurant Index
public function index()
{
  $restaurants = Restaurant::all();

  //Returns View with restaurants
  return view('user.restaurants.index')->with([
    'restaurants' => $restaurants
  ]);
}

//Restaurant Show
public function show($id)
{
  $restaurant = Restaurant::findOrFail($id);
  //Show get the reviews
  $reviews = $restaurant->reviews()->get();

  return view('user.restaurants.show')->with([
    'restaurant' => $restaurant,
    'reviews' => $reviews
]);
}
//Restaurant Welcome
public function welcome()
{
  $restaurant = Restaurant::all();

  return view('user.restaurants.welcome')->with([
    'restaurants' => $restaurants
  ]);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */


}
