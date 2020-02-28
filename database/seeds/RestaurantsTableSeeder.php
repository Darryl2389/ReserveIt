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
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'SOLE Seafood & Grill';
      $restaurant->location = 'South William Street, Dublin';
      $restaurant->type = 'Seafood';
      $restaurant->image= 'sole_rest.jpg';
      $restaurant->table_cap = 20;
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'FIRE Restaurant & Lounge';
      $restaurant->location = 'Dawson Street, Dublin';
      $restaurant->type = 'Steak, Seafood';
      $restaurant->image= 'fire_rest.jpg';
      $restaurant->table_cap = 20;
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Alfies';
      $restaurant->location = 'South William Street, Dublin';
      $restaurant->type = 'International';
      $restaurant->image= 'alfies_rest.jpg';
      $restaurant->table_cap = 20;
      $restaurant->save();


    }
}
