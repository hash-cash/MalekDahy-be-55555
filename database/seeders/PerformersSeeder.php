<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Performers;

class PerformersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$faker->unique()->numberBetween(1, App\User::count())
        $faker = \Faker\Factory::create();

        //Performers::truncate();

        for($i = 0; $i < 10; $i++){
            Performers::create([
                'name' => $faker->name(),
            ]);
        }
    }
}
