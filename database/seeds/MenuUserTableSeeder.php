<?php

use Illuminate\Database\Seeder;

class MenuUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_users')->insert([
            'menu' => 'Moderator'
        ]);

        DB::table('menu_users')->insert([
            'menu' => 'Admin'
        ]);

        DB::table('menu_users')->insert([
            'menu' => 'User'
        ]);
    }
}
