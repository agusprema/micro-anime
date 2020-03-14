<?php

use Illuminate\Database\Seeder;

class AccessMenuUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('access_menu_users')->insert([
            'role_id' => 1,
            'menu_id' => 1
        ]);

        DB::table('access_menu_users')->insert([
            'role_id' => 1,
            'menu_id' => 2
        ]);

        DB::table('access_menu_users')->insert([
            'role_id' => 1,
            'menu_id' => 3
        ]);

        DB::table('access_menu_users')->insert([
            'role_id' => 1,
            'menu_id' => 4
        ]);

        DB::table('access_menu_users')->insert([
            'role_id' => 2,
            'menu_id' => 2
        ]);

        DB::table('access_menu_users')->insert([
            'role_id' => 2,
            'menu_id' => 3
        ]);

        DB::table('access_menu_users')->insert([
            'role_id' => 3,
            'menu_id' => 3
        ]);

    }
}
