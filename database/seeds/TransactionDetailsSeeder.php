<?php

use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // Получаем все существующие `transaction_id`
        $transactionIds = Transaction::pluck('id')->toArray();

        DB::table('transaction_details')->insert([
            'transaction_id' => $faker->randomElement($transactionIds),
            'username' => $faker->userName,
            'nationality' => $faker->countryCode,
            'is_visa' => $faker->boolean,
            'doe_passport' => $faker->dateTimeBetween('+1 year', '+10 years')->format('Y-m-d'),
        ]);
    }
}
