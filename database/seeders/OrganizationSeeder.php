<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 200; $i++) {
            $type = 'private';
            if ($i % 7 == 0) {
                $type = 'government';
            }
            Organization::create([
                'name' => $faker->company,
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
                'website_url' => $faker->domainName,
                'type' => $type
            ]);
        }
    }
}
