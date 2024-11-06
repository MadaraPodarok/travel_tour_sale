<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TravelPackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('travel_packages')->insert([
            'title' => $faker->sentence(3),
            'slug' => Str::slug($faker->sentence(3)),
            'location' => $faker->city,
            'about' => $faker->paragraph(4),
            'featured_event' => $faker->boolean,
            'language' => $faker->randomElement(['English', 'Spanish', 'French', 'German', 'Italian']),
            'foods' => $faker->words(3, true),
            'departure_date' => $faker->dateTimeBetween('+1 week', '+6 months')->format('Y-m-d'),
            'duration' => $faker->numberBetween(3, 14) . ' days',
            'type' => $faker->randomElement(['Adventure', 'Relaxation', 'Cultural', 'Nature']),
            'price' => $faker->randomNumber(4),
        ]);
    }
}
