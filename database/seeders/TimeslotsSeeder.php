<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timeslots;

class TimeslotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        Timeslots::truncate();

        for($i = 0; $i < 10; $i++){
            Timeslots::create([
                'movie_id' => $faker->unique()->numberBetween(1, \App\Models\Movies::count()),
                'theater_name' => $faker->company(),
                'theater_room_no' => $faker->numberBetween(1, 40),
                'start_time' => $faker->dateTimeBetween('-20 week', '+20 week'),
                'end_time' => $faker->dateTimeBetween('-20 week', '+20 week'),
            ]);
        }
    }
}
