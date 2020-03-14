<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AccessMenuUserTableSeeder::class);
        $this->call(MenuUserTableSeeder::class);
        $this->call(MenuGroupUserTableSeeder::class);
        $this->call(SubMenuUserTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(AdsBannerTableSeeder::class);
        $this->call(AdsVideoTableSeeder::class);
        $this->call(ControlPanelTableSeeder::class);
    }
}
