<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('post_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
//            'parent_id' => null,
//            'name'  =>,
//            'seo_title',
//            'meta_keyword',
//            'meta_description',
//            'status',
//            'sort',
        ];

        // DB::table('post_categories')->insert();
    }
}
