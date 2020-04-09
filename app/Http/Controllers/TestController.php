<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Akaunting\Setting\Facade as Setting;
use Analytics;

class TestController extends Controller
{
    public function index()
    {
        /* return view('welcome'); */
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
        return Analytics::getAnalyticsService()->data_realtime->get('ga:205569282', 'rt:activeUsers')->totalsForAllResults['rt:activeUsers'];
    }
}
