<?php

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
public function index()
{

}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create($id)
{
  $restaurant = Restaurant::findOrFail($id);

    return view('user.reviews.create')->with([
      'restaurant' => $restaurant

    ]);
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request,$id)
{

  $request->validate([
  'review' => 'required|max:250',
]);

  $review = new Review();
  $review->review = $request->input('review');
  $review->restaurant_id = $id;
  $review->user_id = Auth::id();

  $review->save();

  return redirect()->route('user.restaurants.show', $id);
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
  $reviews = Review::findOrFail($id);
  return view('user.restaurants.show')->with([
    'reviews' => $reviews

]);
}
//
// /**
//  * Show the form for editing the specified resource.
//  *
//  * @param  int  $id
//  * @return \Illuminate\Http\Response
//  */
// public function edit($id)
// {
//   $reviews = Review::findOrFail($id);
//
//   return view('user.reviews.edit')->with([
//     'reviews' => $reviews
// ]);
//
// }
//   public function update(Request $request, $id)
// {
//   $reviews = Review::findOrFail($id);
//   $user = User::findOrFail(Auth::user()->reviews->id);
//
//   $request->validate([
//   'review' => 'required|max:250',
//
// ]);
//
//   $reviews->date = $request->input('review');
//   $reviews->user_id = $user->id;
//   $reviews->save();
//
//   return redirect()->route('user.reviews.index');
// }
//
//
// public function destroy($id)
// {
//   $reviews = Review::findOrFail($id);
//
//   $reviews->delete();
//
//   return redirect()->route('user.home');
// }
}