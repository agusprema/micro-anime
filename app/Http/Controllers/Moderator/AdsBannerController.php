<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ads_banners;

class AdsBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = ads_banners::orderBy('type_for')->get();

        return view('moderator.ads-banner.index')->with('ads', $ads);
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
            'title'     => 'required',
            'url'       => 'required|active_url',
            'image'     => 'required',
            'type_for'  => 'required|in:home,anime,footer,announcements'
        ]);

        $ads            = new ads_banners;
        $ads->title     = $request->title;
        $ads->url       = $request->url;
        $ads->image     = $request->image;
        $ads->type_for  = $request->type_for;
        $ads->save();

        return redirect('moderator/ads-banner')->with('success', 'Ads Banner has been add');
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
        $ads = ads_banners::find($id);

        return view('moderator.ads-banner.edit')->with('ads', $ads);
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
            'title'     => 'required',
            'url'       => 'required|active_url',
            'image'     => 'required',
            'type_for'  => 'required|in:home,anime,footer,announcements'
        ]);

        $ads            = ads_banners::find($id);
        $ads->title     = $request->title;
        $ads->url       = $request->url;
        $ads->image     = $request->image;
        $ads->type_for  = $request->type_for;
        $ads->save();

        return redirect('moderator/ads-banner')->with('success', 'Ads Banner has been change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ads_banners::destroy($id);

        return redirect('moderator/ads-banner')->with('warning', 'Ads Banner has been deleted.');
    }
}
