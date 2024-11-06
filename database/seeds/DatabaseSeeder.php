<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TravelPackagesSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(TransactionDetailsSeeder::class);
        $this->call(GalleriesSeeder::class);
    }
}
