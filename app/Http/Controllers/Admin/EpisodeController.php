<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\episode_animes;
use App\detail_animes;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function RuleAnime($value)
    {
        $anime_hash = strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
        return $anime_hash;
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
            'id_anime'  => 'required',
            'episode'   => 'required',
            'video'     => 'required'
        ]);

        $episode_query = str_replace(" ", "-", $this->RuleAnime($request->id_anime) . ' Episode ' . $request->episode);

        if($request->next){$next = str_replace(" ", "-", $this->RuleAnime($request->id_anime) . ' Episode ' . $request->next);} else {$next = null;}
        if($request->prev){$prev = str_replace(" ", "-", $this->RuleAnime($request->id_anime) . ' Episode ' . $request->prev);} else {$prev = null;}
        if($request->from_micro){$from_micro = $request->from_micro;} else {$from_micro = "N";}

        $episode                = new episode_animes;
        $episode->id_anime      = $this->RuleAnime($request->id_anime);
        $episode->episode       = $episode_query;
        $episode->video         = $request->video;
        $episode->download      = $request->download;
        $episode->next          = $next;
        $episode->prev          = $prev;
        $episode->from_micro    = $from_micro;
        $episode->author        = Auth::user()->email;
        $episode->save();

        return redirect('admin/episode-anime/'. $this->RuleAnime($request->id_anime))->with('success', 'Episode Anime has been add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $episodes = episode_animes::where('id_anime', $id)->orderBy('episode', 'DESC')->get();
        $detail = detail_animes::where('id_anime', $id)->first();
        $episode2 = episode_animes::where('id_anime', $id)->orderBy('episode', 'DESC')->get()->count();

        if($detail){
            return view('admin.episode-anime.index')->with('episodes', $episodes)->with('title_anime', $detail->title_anime)->with('id_anim', $id)->with('episode2', $episode2);
        } else {
            return abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = episode_animes::where('episode', $id)->first();
        return view('admin.episode-anime.edit')->with('episode', $episode);
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
            'id_anime'  => 'required',
            'episode'   => 'required',
            'video'     => 'required'
        ]);

        $episode_query = str_replace(" ", "-", $this->RuleAnime($request->id_anime) . ' Episode ' . $request->episode);
        if($request->next){$next = str_replace(" ", "-", $this->RuleAnime($request->id_anime) . ' Episode ' . $request->next);} else {$next = null;}
        if($request->prev){$prev = str_replace(" ", "-", $this->RuleAnime($request->id_anime) . ' Episode ' . $request->prev);} else {$prev = null;}
        if($request->from_micro){$from_micro = $request->from_micro;} else {$from_micro = "N";}

        $episode                = episode_animes::where('episode', $id)->first();
        $episode->id_anime      = $this->RuleAnime($request->id_anime);
        $episode->episode       = $episode_query;
        $episode->video         = $request->video;
        $episode->download      = $request->download;
        $episode->next          = $next;
        $episode->prev          = $prev;
        $episode->from_micro    = $from_micro;
        $episode->author        = Auth::user()->email;
        $episode->save();

        return redirect('admin/episode-anime/' . $this->RuleAnime($request->id_anime));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = episode_animes::where('id', $id)->first();
        episode_animes::destroy($id);
        return redirect('admin/episode-anime/' . $episode->id_anime)->with('warning', 'Episode Anime has been deleted.');
    }
}
