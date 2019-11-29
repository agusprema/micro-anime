<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\detail_animes;
use Illuminate\Http\Request;

class DetailAnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_animes = detail_animes::orderBy('id', 'DESC')->get();
        return view('admin.detail-anime.index')->with('detail_animes', $detail_animes);
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
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function show(detail_animes $detail_animes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_animes $detail_animes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail_animes $detail_animes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_animes $detail_animes)
    {
        //
    }
}
