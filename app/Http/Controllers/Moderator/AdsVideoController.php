<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ads_videos;

class AdsVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = ads_videos::orderBy('type_for')->get();

        return view('moderator.ads-video.index')->with('ads', $ads);
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
        $request->validate([
            'message'   => 'required',
            'url'       => 'required|active_url',
            'video'     => 'required',
            'type_for'  => 'required|in:preroll,postroll',
            'expired'   => 'required|date'
        ]);

        $ads            = new ads_videos;
        $ads->message   = $request->message;
        $ads->url       = $request->url;
        $ads->video     = $request->video;
        $ads->type_for  = $request->type_for;
        $ads->expired   = $request->expired;
        $ads->save();

        return redirect('moderator/ads-video')->with('success', 'Ads Video has been add');
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
        $ads = ads_videos::find($id);

        return view('moderator.ads-video.edit')->with('ads', $ads);
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
        $request->validate([
            'message'   => 'required',
            'url'       => 'required|active_url',
            'video'     => 'required',
            'type_for'  => 'required|in:preroll,postroll',
            'expired'   => 'required|date'
        ]);

        $ads            = ads_videos::find($id);
        $ads->message   = $request->message;
        $ads->url       = $request->url;
        $ads->video     = $request->video;
        $ads->type_for  = $request->type_for;
        $ads->expired   = $request->expired;
        $ads->save();

        return redirect('moderator/ads-video')->with('success', 'Ads Video has been change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ads_videos::destroy($id);

        return redirect('moderator/ads-Video')->with('warning', 'Ads Video has been deleted.');
    }
}
