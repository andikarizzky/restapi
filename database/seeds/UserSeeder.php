<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $ php artisan make:seeder UserSeeder

    public function run()
    {
        // factory(App\User::class, 50)->create();

               // Let's clear the users table first
               User::truncate();

               $faker = \Faker\Factory::create();

               // Let's make sure everyone has the same password and
               // let's hash it before the loop, or else our seeder
               // will be too slow.
            //    $password = Hash::make('admin');
               $password = bcrypt('admin');

               User::create([
                   'name' => 'Administrator',
                   'email' => 'admin@test.com',
                   'password' => $password,
               ]);

               // And now let's generate a few dozen users for our app:
               for ($i = 0; $i < 10; $i++) {
                   User::create([
                       'name' => $faker->name,
                       'email' => $faker->email,
                       'password' => $password,
                   ]);
               }
    }
}
