<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class PageController extends Controller
{
    public function welcome(){
      $restaurants = Restaurant::all();

      return view('welcome')->with([
        'restaurants' => $restaurants
      ]);
    }
    public function about(){
      return view('about');
    }

    public function contact(){
      return view('contact');
    }
}
