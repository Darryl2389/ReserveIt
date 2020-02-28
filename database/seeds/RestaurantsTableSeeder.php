<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $restaurant = new Restaurant();
      $restaurant->name = 'The Ivy Dawson Street';
      $restaurant->location = 'Dawson Street, Dublin';
      $restaurant->type = 'British';
      $restaurant->image= 'ivy_dawson_street.jpg';
      $restaurant->table_cap = 20;
      $restaurant->menu = 'https://theivydublin.com/wp-content/uploads/sites/27/2019/11/ALC_DUBLIN_WINTER_2019.pdf';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'SOLE Seafood & Grill';
      $restaurant->location = 'South William Street, Dublin';
      $restaurant->type = 'Seafood';
      $restaurant->image= 'sole_rest.jpg';
      $restaurant->table_cap = 20;
      $restaurant->menu = 'https://www.sole.ie/wp-content/uploads/2018/05/SOLE-ALA-OCTOBER-2019v.pdf';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'FIRE Restaurant & Lounge';
      $restaurant->location = 'Dawson Street, Dublin';
      $restaurant->type = 'Steak, Seafood';
      $restaurant->image= 'fire_rest.jpg';
      $restaurant->table_cap = 20;
      $restaurant->menu = 'https://www.firerestaurant.ie/wp-content/uploads/2019/09/A-LA-October-2019-.pdf';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Alfies';
      $restaurant->location = 'South William Street, Dublin';
      $restaurant->type = 'International';
      $restaurant->image= 'alfies_rest.jpg';
      $restaurant->table_cap = 20;
      $restaurant->menu = 'http://www.alfies.ie/wp-content/uploads/2016/10/IMG-20190916-WA0026.jpg';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Doolally';
      $restaurant->location = 'The Lennox Building, 47-51 Richmond St S, Saint Kevins, Dublin 2, D02 FK02';
      $restaurant->type = 'Indian';
      $restaurant->image= 'doolally_rest.jpg';
      $restaurant->table_cap = 60;
      $restaurant->menu = 'https://www.firerestaurant.ie/wp-content/uploads/2019/09/A-LA-October-2019-.pdf​';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'La Taqueria';
      $restaurant->location = '53 Castle St, Belfast BT1 1GH, United Kingdom';
      $restaurant->type = 'Mexican';
      $restaurant->image= 'taqueria_rest.jpg';
      $restaurant->table_cap = 55;
      $restaurant->menu = 'https://www.lataqueriabelfast.co.uk/menu/';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Coqbull';
      $restaurant->location = '50 Thomas St, Limerick, V94 P8P2';
      $restaurant->type = 'Comfort Food';
      $restaurant->image= 'coqbull_rest.jpg';
      $restaurant->table_cap = 40;
      $restaurant->menu = 'http://www.coqbull.com/wp-content/uploads/2019/08/CBC-DINNER-AUG-19.pdf​';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Tribeton';
      $restaurant->location = '1-3 Merchants Rd, Galway, H91 AT0V';
      $restaurant->type = 'Irish';
      $restaurant->image= 'tribeton_rest.jpg';
      $restaurant->table_cap = 54;
      $restaurant->menu = 'https://www.tribeton.ie/menu';
      $restaurant->save();


    }
}
