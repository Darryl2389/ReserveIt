<?php
//Home Controller




namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {
      $user = $request->user();
      $home = 'user.home';

      //If the admin is logged in then go to admin home
      if ($user->hasRole('admin')){
        $home = 'admin.home';
      }
      //Otherwise go to user home
      else {
        $home = 'user.home';

      }
        return redirect()->route($home);
    }
}
