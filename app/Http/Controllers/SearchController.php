<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    function index()
    {
     return view('welcome');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('restaurants')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('location', 'like', '%'.$query.'%')
         ->orWhere('type', 'like', '%'.$query.'%')
         ->get();
       }

      $total_row = $data->count();
      if($total_row > 0)
      {
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
    // function searchResults(){
    //   {
    //   	$query = Input::get ( 'q' );
    //   	if($query != ""){
    //   		$restaurant = Restaurant::where ( 'name', 'LIKE', '%' . $restaurant . '%' )->orWhere ( 'type', 'LIKE', '%' . $restaurant . '%' )->get ();
    //   		if (count ( $restaurant ) > 0)
    //   			return view ( 'searchResults' )->withDetails ( $restaurant )->withQuery ( $restaurant );
    //   		else
    //   			return view ( 'searchResults' )->withMessage ( 'No Details found. Try to search again !' );
    //   	}
    //   	return view ( 'searchResults' )->withMessage ( 'No Details found. Try to search again !' );
    //   }
    // }
}
