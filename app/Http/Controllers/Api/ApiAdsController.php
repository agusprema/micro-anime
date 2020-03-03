<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = \DB::table('ads_videos')->where('expired', '>', date('Y-m-d'))->orderBy('id', 'desc')->limit(2)->get();

        return '{"'. $ads[0]->type_for .'":{
            "vastUrl":null,
            "mediaSrc":"'. $ads[0]->video .'",
            "clickThroughUrl":"'. $ads[0]->url .'",
            "massage":"'. $ads[0]->message .'"
        },"'. $ads[1]->type_for .'":{
            "vastUrl":null,
            "mediaSrc":"'. $ads[1]->video .'",
            "clickThroughUrl":"'. $ads[1]->url .'",
            "massage":"'. $ads[1]->message .'"
        },"skipAdTime":5}';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
