<?php

use Illuminate\Database\Seeder;

class MenuGroupUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('menu_groups')->insert([
            'menu_id'   => 0,
            'name'      => '',
            'icon'      => ''
        ]);

        DB::table('menu_groups')->insert([
            'menu_id'   => 1,
            'name'      => 'Menu management',
            'icon'      => 'fas fa-folder-minus'
        ]);

        DB::table('menu_groups')->insert([
            'menu_id'   => 1,
            'name'      => 'Ads management',
            'icon'      => 'fab fa-buysellads'
        ]);

        DB::table('menu_groups')->insert([
            'menu_id'   => 2,
            'name'      => 'Anime management',
            'icon'      => 'fas fa-faw'
        ]);
    }
}
