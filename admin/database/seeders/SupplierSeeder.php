<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('suppliers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'name'      => 'Bitis',
                'phone'     => '012345678',
                'address'   => 'HCM',
                'email'     => 'bitis@gmail.com',
            ],
            [
                'name'      => 'Adidas',
                'phone'     => '012345678',
                'address'   => 'HCM',
                'email'     => 'adidas@gmail.com',
            ],
            [
                'name'      => 'Nike',
                'phone'     => '012345678',
                'address'   => 'HCM',
                'email'     => 'nike@gmail.com',
            ],
            [
                'name'      => 'Ananas',
                'phone'     => '012345678',
                'address'   => 'HCM',
                'email'     => 'ananas@gmail.com',
            ],
            [
                'name'      => 'Routine',
                'phone'     => '012345678',
                'address'   => 'HCM',
                'email'     => 'Routine@gmail.com',
            ],
            [
                'name'      => 'The Rabbit',
                'phone'     => '012345678',
                'address'   => 'HCM',
                'email'     => 'the.rabbit@gmail.com',
            ]
        ];

        DB::table('suppliers')->insert($data);
    }
}
