<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Akaunting\Setting\Facade as Setting;
use Analytics;
use GuzzleHttp\Client;

class TestController extends Controller
{
    public function RuleAnime($value)
    {
        $anime_hash = strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
        return $anime_hash;
    }

    public function index()
    {
        /* $pageoffset = 20 * 20;
        $client = new Client();
        $res = $client->request('GET', 'https://kitsu.io/api/edge/anime?page[limit]=20&page[offset]='.(($pageoffset == 20) ? 0: $pageoffset));

        $result= $res->getBody();
        $someArray = json_decode($result, true); */
        /* return $someArray["data"][0]["id"]; */
        /* return $someArray["data"][0]; */
        /* dump($someArray); */
        /* foreach ($someArray["data"] as $anime) {
            $cart[] = array('id_anime' => $this->RuleAnime($anime["attributes"]["titles"]["en_jp"]),
            'title_anime'       =>  $anime["attributes"]["titles"]["en_jp"],
            'alternative_title' =>  $anime["attributes"]["titles"]["ja_jp"],
            'summary_anime'     =>  $anime["attributes"]["synopsis"],
            'rating_anime'      =>  $anime["attributes"]["averageRating"],
            'status_anime'      =>  ($anime["attributes"]["status"] == 'finished')? 'Tamat' : 'Ongoing',
            'type_anime'        =>  $anime["attributes"]["subtype"],
            'total_anime'       =>  $anime["attributes"]["episodeCount"],
            'genre_anime'       =>  $anime["id"],
            'jadwal_anime'      =>  '',
            'image_anime'       =>  $anime["attributes"]["posterImage"]["small"],
            'background_anime'  =>  $anime["attributes"]["coverImage"]["tiny"],
            'author'            =>  'agusprema@gmail.com');
        };

        return $cart; */

        return view('welcome');
        /* Setting::set('lazy_load.status', 'false'); */
        /* Setting::set([
                'bassic_settings'   => [
                    'lazy_load'     => [
                        'id_setting'=> 'lazy_load',
                        'name'      => 'Laravel Lazy Load',
                        'massage'   => '',
                        'status'    => 'false',
                        'extra'     => [
                            'InputText'     => '',
                            'InputRadio'    => '',
                            'InputCheckBox' => '',
                        ]
                    ],'chat_box'    => [
                        'id_setting'=> 'chat_box',
                        'name'      => 'Chat Box',
                        'massage'   => '',
                        'status'    => 'false',
                        'extra'     => [
                            'InputText'     => '',
                            'InputRadio'    => '',
                            'InputCheckBox' => '',
                        ]
                    ]
                ], 'user_settings'  => [
                    'coba'     => [
                        'id_setting'=> 'coba',
                        'name'      => 'Coba',
                        'group'     => 'User',
                        'massage'   => '',
                        'status'    => 'false',
                        'extra'     => [
                            'InputText'     => '',
                            'InputRadio'    => '',
                            'InputCheckBox' => '',
                        ]
                    ]
                ]
            ]
        ); */
        /* dd(Setting::has('bassic')); */
        /* return Setting::all(); */
        /* return Analytics::getAnalyticsService()->data_realtime->get('ga:205569282', 'rt:activeUsers')->totalsForAllResults['rt:activeUsers']; */
    }
}
