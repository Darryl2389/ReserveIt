<?php

//

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name','admin')->first();
      $role_user = Role::where('name','user')->first();

      //Seeds new user as an admin
      $admin = new User();
      $admin->name = 'Darryl Sullivan';
      $admin->email = 'admin@reserveit.ie';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      //Seeds new user as a user
      $user = new User();
      $user->name = 'Darryl Sullivan';
      $user->email = 'darryls@reserveit.ie';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);

      //Seeders 20 users using factory
      factory(App\User::class,20)->create()->each(function($user){
  $user->roles()->attach(Role::where('name', 'user')->first());

});


    }
}
