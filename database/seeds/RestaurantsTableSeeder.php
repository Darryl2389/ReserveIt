<?php

//Restaurant Table Seeder

use Illuminate\Database\Seeder;
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //Seeds the Restaurants Table
    public function run()
    {
      $restaurant = new Restaurant();
      $restaurant->name = 'The Ivy Dawson Street'; //Restaurant Name
      $restaurant->location = '13-17 Dawson St, Dublin, D02 TF98'; //Restaurant Full Address
      $restaurant->type = 'British'; //Restaurant Food Type
      $restaurant->image= 'ivy_dawson_street.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 20; //Restaurant Table Capacity
      $restaurant->menu = 'https://theivydublin.com/wp-content/uploads/sites/27/2019/11/ALC_DUBLIN_WINTER_2019.pdf'; //Restaurant Menu
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'SOLE Seafood & Grill'; //Restaurant Name
      $restaurant->location = '18-19 William St S, Dublin, D02 KV76'; //Restaurant Full Address
      $restaurant->type = 'Seafood'; //Restaurant Food Type
      $restaurant->image= 'sole_rest.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 40; //Restaurant Table Capacity
      $restaurant->menu = 'https://www.sole.ie/wp-content/uploads/2018/05/SOLE-ALA-OCTOBER-2019v.pdf'; //Restaurant Menu
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'FIRE Restaurant & Lounge'; //Restaurant Name
      $restaurant->location = 'The Mansion House, Dawson St, Dublin 2'; //Restaurant Full Address
      $restaurant->type = 'Steak, Seafood'; //Restaurant Food Type
      $restaurant->image= 'fire_rest.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 55; //Restaurant Table Capacity
      $restaurant->menu = 'https://www.firerestaurant.ie/wp-content/uploads/2019/09/A-LA-October-2019-.pdf'; //Restaurant Menu
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Alfies'; //Restaurant Name
      $restaurant->location = '10 William St S, Dublin, D02 TE80'; //Restaurant Full Address
      $restaurant->type = 'International'; //Restaurant Food Type
      $restaurant->image= 'alfies_rest.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 66; //Restaurant Table Capacity
      $restaurant->menu = 'http://www.alfies.ie/wp-content/uploads/2016/10/IMG-20190916-WA0026.jpg'; //Restaurant Menu
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Doolally'; //Restaurant Name
      $restaurant->location = 'The Lennox Building, 47-51 Richmond St S, Saint Kevins, Dublin 2, D02 FK02'; //Restaurant Full Address
      $restaurant->type = 'Indian'; //Restaurant Food Type
      $restaurant->image= 'doolally_rest.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 60; //Restaurant Table Capacity
      $restaurant->menu = 'https://www.firerestaurant.ie/wp-content/uploads/2019/09/A-LA-October-2019-.pdf​'; //Restaurant Menu
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'La Taqueria'; //Restaurant Name
      $restaurant->location = '53 Castle St, Belfast BT1 1GH, United Kingdom'; //Restaurant Full Address
      $restaurant->type = 'Mexican'; //Restaurant Food Type
      $restaurant->image= 'taqueria_rest.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 55; //Restaurant Table Capacity
      $restaurant->menu = 'https://www.lataqueriabelfast.co.uk/menu/'; //Restaurant Menu
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Coqbull'; //Restaurant Name
      $restaurant->location = '50 Thomas St, Limerick, V94 P8P2'; //Restaurant Full Address
      $restaurant->type = 'Comfort Food'; //Restaurant Food Type
      $restaurant->image= 'coqbull_rest.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 40; //Restaurant Table Capacity
      $restaurant->menu = 'http://www.coqbull.com/wp-content/uploads/2019/08/CBC-DINNER-AUG-19.pdf​'; //Restaurant Menu
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Tribeton'; //Restaurant Name
      $restaurant->location = '1-3 Merchants Rd, Galway, H91 AT0V'; //Restaurant Full Address
      $restaurant->type = 'Irish'; //Restaurant Food Type
      $restaurant->image= 'tribeton_rest.jpg'; //Restaurant Cover Image
      $restaurant->table_cap = 54; //Restaurant Table Capacity
      $restaurant->menu = 'https://www.tribeton.ie/menu'; //Restaurant Menu
      $restaurant->save();


    }
}
