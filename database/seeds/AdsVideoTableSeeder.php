<?php

use Illuminate\Database\Seeder;

class AdsVideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads_videos')->insert([
            'message'   => 'Tertarik ?',
            'url'       => '//micro.com',
            'video'     => '//s1.adform.net/Banners/Elements/Files/140272/1966255.mp4?bv=0',
            'type_for'  => 'preroll',
            'expired'   => '2020-12-31'
        ]);

        DB::table('ads_videos')->insert([
            'message'   => 'Tai gede 2',
            'url'       => '//micro.com',
            'video'     => '//s1.adform.net/Banners/Elements/Files/140272/1983748.mp4?bv=0',
            'type_for'  => 'postroll',
            'expired'   => '2020-12-31'
        ]);
    }
}
