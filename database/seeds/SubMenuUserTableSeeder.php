<?php

use Illuminate\Database\Seeder;

class SubMenuUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 0,
            'title'     => 'Dashboard',
            'url'       => 'moderator',
            'icon'      => 'fas fa-tachometer-alt',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 2,
            'title'     => 'Menu Management',
            'url'       => 'moderator/menu',
            'icon'      => 'fas fa-folder',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 2,
            'title'     => 'Sub Menu Management',
            'url'       => 'moderator/submenu',
            'icon'      => 'fas fa-folder-open',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 0,
            'title'     => 'Role Management',
            'url'       => 'moderator/role',
            'icon'      => 'fas fa-user',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 2,
            'title'     => 'Group menu',
            'url'       => 'moderator/group-menu',
            'icon'      => 'fas fa-layer-group',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 0,
            'title'     => 'Users',
            'url'       => 'moderator/users',
            'icon'      => 'fas fa-user',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 3,
            'title'     => 'Ads Banner Management',
            'url'       => 'moderator/ads-banner',
            'icon'      => 'fab fa-buysellads',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 1,
            'group_id'  => 3,
            'title'     => 'Ads Video Management',
            'url'       => 'moderator/ads-video',
            'icon'      => 'fab fa-buysellads',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 3,
            'group_id'  => 0,
            'title'     => 'Control Panel',
            'url'       => 'moderator/control-panel',
            'icon'      => 'fas fa-cogs',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 2,
            'group_id'  => 4,
            'title'     => 'Anime',
            'url'       => 'admin/anime',
            'icon'      => 'fas fa-dragon',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 2,
            'group_id'  => 4,
            'title'     => 'Slider Anime',
            'url'       => 'admin/slider-anime',
            'icon'      => 'fas fa-list',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 2,
            'group_id'  => 4,
            'title'     => 'Detail Anime',
            'url'       => 'admin/detail-anime',
            'icon'      => 'fas fa-info-circle',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 3,
            'group_id'  => 0,
            'title'     => 'My Profile',
            'url'       => 'user/profile',
            'icon'      => 'fas fa-user',
            'is_active' => 1
        ]);

        DB::table('sub_menu_users')->insert([
            'menu_id'   => 3,
            'group_id'  => 0,
            'title'     => 'Bookmark Anime',
            'url'       => 'user/bookmark-anime',
            'icon'      => 'fas fa-bookmark',
            'is_active' => 1
        ]);
    }
}
