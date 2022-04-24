<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inquiry;

class InquiriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 300; $i++) {
            Inquiry::create([
                'complete_name' => $faker->name,
                'email' => $faker->email,
                'message' => $faker->text
            ]);
        }
    }
}
