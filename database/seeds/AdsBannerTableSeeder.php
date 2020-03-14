<?php

use Illuminate\Database\Seeder;

class AdsBannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads_banners')->insert([
            'title'     => 'home',
            'url'       => '//micro.com',
            'image'     => '//micro.com/storage/GlhyL6duscOUJ6V1EN1PvLUPKb18ykLw53GVx0hl.gif',
            'type_for'  => 'home',
            'expired'   => '2020-12-31'
        ]);

        DB::table('ads_banners')->insert([
            'title'     => 'home',
            'url'       => '//micro.com',
            'image'     => '//micro.com/storage/GlhyL6duscOUJ6V1EN1PvLUPKb18ykLw53GVx0hl.gif',
            'type_for'  => 'home',
            'expired'   => '2020-12-31'
        ]);

        DB::table('ads_banners')->insert([
            'title'     => 'home',
            'url'       => '//micro.com',
            'image'     => '//micro.com/storage/GlhyL6duscOUJ6V1EN1PvLUPKb18ykLw53GVx0hl.gif',
            'type_for'  => 'home',
            'expired'   => '2020-12-31'
        ]);

        DB::table('ads_banners')->insert([
            'title'     => 'home',
            'url'       => '//micro.com',
            'image'     => '//micro.com/storage/GlhyL6duscOUJ6V1EN1PvLUPKb18ykLw53GVx0hl.gif',
            'type_for'  => 'home',
            'expired'   => '2020-12-31'
        ]);

        DB::table('ads_banners')->insert([
            'title'     => 'anime',
            'url'       => '//micro.com',
            'image'     => '//micro.com/storage/OKAjA04QFZi718vDE3XHACi8GlJE3xBf63huSjVX.gif',
            'type_for'  => 'anime',
            'expired'   => '2020-12-31'
        ]);

        DB::table('ads_banners')->insert([
            'title'     => 'footer',
            'url'       => '//micro.com',
            'image'     => '//micro.com/storage/OKAjA04QFZi718vDE3XHACi8GlJE3xBf63huSjVX.gif',
            'type_for'  => 'footer',
            'expired'   => '2020-12-31'
        ]);

        DB::table('ads_banners')->insert([
            'title'     => 'announcements',
            'url'       => '//micro.com',
            'image'     => '//micro.com/storage/OKAjA04QFZi718vDE3XHACi8GlJE3xBf63huSjVX.gif',
            'type_for'  => 'announcements',
            'expired'   => '2020-12-31'
        ]);
    }
}
