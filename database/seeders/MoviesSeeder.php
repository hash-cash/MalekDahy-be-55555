<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movies;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        //Movies::truncate();

        for($i = 0; $i < 10; $i++){
            Movies::create([
                'title' => $faker->sentence,
                'genre' => $faker->randomElement($array = array ('Horror','Action','Drama','Romance','Comedy','Science Fiction','Crime')),
                'duration' => $faker->numberBetween(100, 400),
                'views' => $faker->numberBetween(10000, 100000000),
                'rating' => $faker->numberBetween(1, 10),
                'poster' => $faker->sentence,
                'description' => $faker->sentence,
            ]);
        }
    }
}
