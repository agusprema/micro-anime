<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\slider_animes;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider_animes::orderBy('id', 'DESC')->get();
        return view('admin.slider-anime.index')->with('sliders', $sliders);
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

    public function RuleAnime($value)
    {
        $anime_hash = strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
        return $anime_hash;
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
            'id_anime' => 'required'
        ]);

        $slider_animes                 = new slider_animes;
        $slider_animes->id_anime       = $this->RuleAnime($request->id_anime);
        $slider_animes->author         = Auth::user()->email;
        $slider_animes->save();

        return redirect('admin/slider-anime')->with('success', 'Slider Anime has been add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\slider_animes  $slider_animes
     * @return \Illuminate\Http\Response
     */
    public function show(slider_animes $slider_animes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\slider_animes  $slider_animes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = slider_animes::where('id', $id)->first();
        return view('admin.slider-anime.edit')->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\slider_animes  $slider_animes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anime' => 'required'
        ]);

        $slider_animes                 = slider_animes::find($id);
        $slider_animes->id_anime       = $this->RuleAnime($request->id_anime);
        $slider_animes->author         = Auth::user()->email;
        $slider_animes->save();

        return redirect('/admin/slider-anime')->with('success', 'Slider Anime has been change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\slider_animes  $slider_animes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        slider_animes::destroy($id);
        return redirect('/admin/slider-anime')->with('warning', 'Slider Anime has been deleted.');
    }
}
