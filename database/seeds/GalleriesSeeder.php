<?php

use App\TravelPackage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class GalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // Получаем все существующие `travel_packages_id`
        $travelPackageIds = TravelPackage::pluck('id')->toArray();

        DB::table('galleries')->insert([
            'travel_packages_id' => $faker->randomElement($travelPackageIds),
            'image' => Str::random(10),
        ]);
    }
}
