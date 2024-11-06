<?php

use App\Transaction;
use App\TravelPackage;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();
        $travelPackageIds = TravelPackage::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        Transaction::create([
            'travel_packages_id' => $faker->randomElement($travelPackageIds),
            'users_id' => $faker->randomElement($userIds),
            'additional_visa' => $faker->boolean,
            'transaction_total' => $faker->randomNumber(4),
            'transaction_status' => $faker->randomElement([1, 2, 3]),
        ]);
    }
}
