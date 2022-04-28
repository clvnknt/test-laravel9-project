<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Friend;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 500; $i++) {
            Friend::create([
                'complete_name' => $faker->name,
                'email' => $faker->email,
                'contact_number' => $faker->phoneNumber
            ]);
        }
    }
}
