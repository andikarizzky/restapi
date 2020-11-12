<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // php artisan make:seeder ArticlesTableSeeder

    // $ php artisan db:seed --class=ArticlesTableSeeder run seeder

    public function run()
    {
                // Let's truncate our existing records to start from scratch.
                Article::truncate();

                $faker = \Faker\Factory::create();

                // And now, let's create a few articles in our database:
                for ($i = 0; $i < 50; $i++) {
                    Article::create([
                        'title' => $faker->sentence,
                        'body' => $faker->paragraph,
                    ]);
                }
    }
}
