<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        echo strtotime('2019-12-31 18:00:48');
        echo '<br>';
        echo time();
        echo '<br>';
        echo time() - strtotime('2019-12-31 17:00:48');
        echo '<br>';
        echo (60*60*2) . 'awas';
        echo '<br>';

        if(time() - strtotime('2019-12-31 17:00:48') > (60*60*2)){
            echo 'atas';
        } else {
            echo 'bawah';
        }
    }
}
