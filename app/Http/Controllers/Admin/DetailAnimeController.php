<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\detail_animes;
use Illuminate\Http\Request;
use App\genres;
use Illuminate\Support\Facades\Auth;

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
        foreach (genres::all() as $genre){$gen[] = $genre->genre;}

        $input = ['locales' => $gen];

        $request->validate($input,[
            'id_anime' => 'required',
            'title_anime' => 'required',
            'summary_anime' => 'required',
            'rating_anime' => 'numeric',
            'vote_anime' => 'integer',
            'status_anime' => 'required|in:Ongoing,Tamat',
            'type_anime' => 'required|in:TV,OVA,Movie',
            'total_anime' => 'integer',
            'genre_anime' => 'required|in_array:locales.*',
            'jadwal_anime' => 'required|in:none,senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu,Random',
            'image_anime' => 'required',
            'background_anime' => 'nullable'
        ]);

        if($request->label_hot){$label_hot = $request->label_hot;} else {$label_hot = 'N';}
        if($request->label_new){$label_new = $request->label_new;} else {$label_new = 'N';}

        $detail_animes                      = new detail_animes;
        $detail_animes->id_anime            = $this->RuleAnime($request->id_anime);
        $detail_animes->title_anime         = $request->title_anime;
        $detail_animes->alternative_title   = $request->alternative_title;
        $detail_animes->summary_anime       = $request->summary_anime;
        $detail_animes->rating_anime        = $request->rating_anime;
        $detail_animes->vote_anime          = $request->vote_anime;
        $detail_animes->status_anime        = $request->status_anime;
        $detail_animes->type_anime          = $request->type_anime;
        $detail_animes->total_anime         = $request->total_anime;
        $detail_animes->genre_anime         = $request->genre_anime;
        $detail_animes->jadwal_anime        = $request->jadwal_anime;
        $detail_animes->label_hot           = $label_hot;
        $detail_animes->label_new           = $label_new;
        $detail_animes->image_anime         = $request->image_anime;
        $detail_animes->background_anime    = $request->background_anime;
        $detail_animes->author              = Auth::user()->email;
        $detail_animes->save();

        return redirect('admin/detail-anime')->with('success', 'Detail Anime has been add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = detail_animes::where('id', $id)->first();
        return view('admin.detail-anime.show')->with('detail', $detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = detail_animes::where('id', $id)->first();
        return view('admin.detail-anime.edit')->with('detail', $detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        foreach (genres::all() as $genre){$gen[] = $genre->genre;}

        $input = ['locales' => $gen];

        $request->validate($input,[
            'id_anime' => 'required',
            'title_anime' => 'required',
            'summary_anime' => 'required',
            'rating_anime' => 'numeric',
            'vote_anime' => 'integer',
            'status_anime' => 'required|in:Ongoing,Tamat',
            'type_anime' => 'required|in:TV,OVA,Movie',
            'total_anime' => 'integer',
            'genre_anime' => 'required|in_array:locales.*',
            'jadwal_anime' => 'required|in:none,senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu,Random',
            'image_anime' => 'required',
            'background_anime' => 'nullable'
        ]);

        if($request->label_hot){$label_hot = $request->label_hot;} else {$label_hot = 'N';}
        if($request->label_new){$label_new = $request->label_new;} else {$label_new = 'N';}

        $detail_animes                      = detail_animes::find($id);
        $detail_animes->id_anime            = $this->RuleAnime($request->id_anime);
        $detail_animes->title_anime         = $request->title_anime;
        $detail_animes->alternative_title   = $request->alternative_title;
        $detail_animes->summary_anime       = $request->summary_anime;
        $detail_animes->rating_anime        = $request->rating_anime;
        $detail_animes->vote_anime          = $request->vote_anime;
        $detail_animes->status_anime        = $request->status_anime;
        $detail_animes->type_anime          = $request->type_anime;
        $detail_animes->total_anime         = $request->total_anime;
        $detail_animes->genre_anime         = $request->genre_anime;
        $detail_animes->jadwal_anime        = $request->jadwal_anime;
        $detail_animes->label_hot           = $label_hot;
        $detail_animes->label_new           = $label_new;
        $detail_animes->image_anime         = $request->image_anime;
        $detail_animes->background_anime    = $request->background_anime;
        $detail_animes->author              = Auth::user()->email;
        $detail_animes->save();

        return redirect('/admin/detail-anime')->with('success', 'Detail Anime has been change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detail_animes  $detail_animes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        detail_animes::destroy($id);
        return redirect('/admin/detail-anime')->with('warning', 'Detail Anime has been deleted.');
    }
}
