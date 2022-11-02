<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'name' => 'Giày nam'
            ],
            [
                'name' => 'Giày nũ'
            ],
            [
                'name' => 'Giày trẻ em'
            ],
            [
                'name' => 'Giày nam'
            ],
            [
                'name' => 'Áo thun'
            ],
            [
                'name' => 'Áo Polo'
            ],
            [
                'name' => 'Quần áo thể thao'
            ],
            [
                'name' => 'Đồ ấm'
            ],
            [
                'name' => 'Áo khoác'
            ],
            [
                'name' => 'Quần dài'
            ],
            [
                'name' => 'Quần Jeans'
            ],
            [
                'name' => 'Quần Shorts'
            ],
            [
                'name' => 'Túi xách'
            ],
            [
                'name' => 'Balo'
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
