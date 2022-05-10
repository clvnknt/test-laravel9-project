<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AddMoreUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('secretpassword');
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 2000; $i++) {
            $name = $faker->name;
            $email = $faker->email;
            $email_exists = User::findByEmail($email);
            if (is_null($email_exists)) {
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password
                ]);
                error_log($i . ' ' . $email);
            }
        }
    }
}
