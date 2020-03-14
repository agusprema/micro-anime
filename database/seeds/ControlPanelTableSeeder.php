<?php

use Illuminate\Database\Seeder;

class ControlPanelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('control_panels')->insert([
            'name_controll' => 'lazy load',
            'status'        => 'false'
        ]);

        DB::table('control_panels')->insert([
            'name_controll' => 'chat box',
            'status'        => 'false'
        ]);
    }
}
