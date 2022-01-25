<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 30; $i++){
            User::insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'alamat' => $faker->address,
                'no_telp' => $faker->numberBetween(8000,9000),
                'password' => Hash::make(12345)
            ]);
        }
    }
}
