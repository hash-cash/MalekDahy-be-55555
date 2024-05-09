<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerformersMovies;

class PerformersMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        //Performers::truncate();

        for($i = 0; $i < 10; $i++){
            PerformersMovies::create([
                'movie_id' => $faker->unique()->numberBetween(1, \App\Models\Movies::count()),
                'name' => $faker->name(),
            ]);
        }
    }
}
