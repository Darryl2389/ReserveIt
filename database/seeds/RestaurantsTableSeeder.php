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
      $restaurant->image= 'https://resizer.otstatic.com/v2/photos/legacy/26002669.jpg';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'SOLE Seafood & Grill';
      $restaurant->location = 'South William Street, Dublin';
      $restaurant->type = 'Seafood';
      $restaurant->image= 'https://resizer.otstatic.com/v2/photos/legacy/2/26481448.jpg';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'FIRE Restaurant & Lounge';
      $restaurant->location = 'Dawson Street, Dublin';
      $restaurant->type = 'Steak, Seafood';
      $restaurant->image= 'https://resizer.otstatic.com/v2/photos/legacy/2/26481589.jpg';
      $restaurant->save();

      $restaurant = new Restaurant();
      $restaurant->name = 'Alfies';
      $restaurant->location = 'South William Street, Dublin';
      $restaurant->type = 'International';
      $restaurant->image= 'https://resizer.otstatic.com/v2/photos/legacy/2/26481589.jpg';
      $restaurant->save();


    }
}
