<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\animes;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = animes::orderBy('id', 'DESC')->get();

        return view('admin.anime.index')->with('animes', $animes);
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

        $animes                 = new animes;
        $animes->id_anime       = $this->RuleAnime($request->id_anime);
        $animes->author         = Auth::user()->email;
        $animes->save();

        return redirect('admin/anime')->with('success', 'Anime has been add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\animes  $animes
     * @return \Illuminate\Http\Response
     */
    public function show(animes $animes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\animes  $animes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anime = animes::where('id', $id)->first();
        return view('admin.anime.edit')->with('anime', $anime);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\animes  $animes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anime' => 'required'
        ]);

        $animes                 = animes::find($id);
        $animes->id_anime       = $this->RuleAnime($request->id_anime);
        $animes->author         = Auth::user()->email;
        $animes->save();

        return redirect('/admin/anime')->with('success', 'Anime has been change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\animes  $animes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        animes::destroy($id);
        return redirect('/admin/anime')->with('warning', 'Anime has been deleted.');
    }
}
