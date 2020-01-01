<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AnimeLabelHelper;

class TestController extends Controller
{
    public function index()
    {
        return AnimeLabelHelper::instance()->label_hot('shokugeki-no-souma-shin-no-sara');
    }
}
