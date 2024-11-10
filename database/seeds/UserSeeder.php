<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'username' => $faker->userName,
            'name' => $faker->lastName . ' ' . $faker->firstName,
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'ADMIN',
            'is_visa' => false,
            'passport' => $faker->randomNumber(5)
        ]);
    }
}
