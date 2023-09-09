<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Insert random users
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {

            $phoneNumber = '0' . $faker->randomElement(['9', '8', '7']) .
                $faker->numberBetween(10, 99) .
                '-' .
                $faker->numberBetween(100, 999) .
                '-' .
                $faker->numberBetween(1000, 9999);

            DB::table('users')->insert([
                'name' => $faker->name,
                'role_id' => $faker->numberBetween(1, 4), // Random role between 1 and 4
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('1111'),
                'contact_number' => $phoneNumber, // Random Philippine phone number format
                'address' => Str::limit($faker->address, 20), // Limit address to 255 characters
                'profile_image' => ""
            ]);
        }
    }
}
