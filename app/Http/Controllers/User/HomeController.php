<?php
//User Home Controller
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Auth;

class HomeController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
    $this->middleware('role:user');
}

  public function index()

  {
    $user = Auth::user();
      $reservations = Reservation::where('user_id',$user->id)->get();
      return view('user.home')->with([
      'reservations' => $reservations
    ]);
    }
  }
