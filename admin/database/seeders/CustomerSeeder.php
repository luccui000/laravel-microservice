<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('customers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        $numberOfCustomer = 10;
        $data = [];

        foreach (range(0, $numberOfCustomer) as $index) {
            $data[] = [
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'phone' => '039172121',
                'address_1' => $faker->address(),
                'address_2' => '',
                'city' => $faker->city(),
                'country' => $faker->country(),
                'email' => $faker->email(),
                'billing_address' => $faker->address(),
                'billing_region' => $faker->country(),
                'billing_postalcode' => random_int(10000, 100000),
                'billing_country' => $faker->country(),
                'ship_address' => $faker->address(),
                'ship_region' => $faker->country(),
                'ship_postalcode' => random_int(10000, 100000),
                'ship_country' => $faker->country(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('customers')->insert($data);
    }
}
