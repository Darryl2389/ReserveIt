<?php
//Searchbar Controller


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    //Searchbar Index
    function index()
    {
     return view('welcome');
    }

    //Searchbar action function
    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      //Where typed into the searchbar on the home page
      if($query != '')
      {
       //If data searched is like name, location or type
       $data = DB::table('restaurants')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('location', 'like', '%'.$query.'%')
         ->orWhere('type', 'like', '%'.$query.'%')
         ->get();
       }


      $total_row = $data->count();
      if($total_row > 0)
      {
       //Output data like what has been entered
       foreach($data as $row)
       {
        $output .="
        <tr>
         <td><a href='/user/restaurants/".$row->id."'>".$row->name."</a></td>
         <td>".$row->location."</td>
        </tr>
        ";
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="12">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row,
      );


      echo json_encode($data);
     }
    }

}
