<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\animes;
use App\detail_animes;
use App\genres;
use App\episode_animes;
use App\list_user_animes;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $anime = animes::join('detail_animes', 'animes.id_anime', '=', 'detail_animes.id_anime')->where('detail_animes.title_anime', 'like', '%' . $request->get('s') . '%')->orWhere('detail_animes.alternative_title', 'like', '%' . $request->get('s') . '%')->orderBy('animes.id', 'desc')->paginate(20);
        if ($request->get('s')) {
            $anime->setPath(url('/?s=') . $request->get('s'));
        }
        return view('home.home')->with('animes', $anime);
    }

    public function ongoing()
    {
        $ongoing = detail_animes::where('status_anime', 'Ongoing')->orderBy('id', 'desc')->paginate(20);
        return view('home.ongoing')->with('ongoings', $ongoing);
    }

    public function tamat()
    {
        $tamat = detail_animes::where('status_anime', 'Tamat')->orderBy('id', 'desc')->paginate(20);
        return view('home.tamat')->with('tamats', $tamat);
    }

    public function list_anime()
    {
        $sd = detail_animes::where('title_anime', 'like', '1%')
            ->orWhere('title_anime', 'like', '2%')
            ->orWhere('title_anime', 'like', '3%')
            ->orWhere('title_anime', 'like', '4%')
            ->orWhere('title_anime', 'like', '5%')
            ->orWhere('title_anime', 'like', '6%')
            ->orWhere('title_anime', 'like', '7%')
            ->orWhere('title_anime', 'like', '8%')
            ->orWhere('title_anime', 'like', '9%')
            ->orWhere('title_anime', 'like', '0%')
            ->orWhere('title_anime', 'like', '.%')
            ->orWhere('title_anime', 'like', '/%')
            ->orWhere('title_anime', 'like', '?%')
            ->orWhere('title_anime', 'like', '+%')
            ->orWhere('title_anime', 'like', '-%')
            ->orderBy('id', 'desc')->get();
        $as = detail_animes::where('title_anime', 'like', 'a%')->orderBy('id', 'desc')->get();
        $bs = detail_animes::where('title_anime', 'like', 'b%')->orderBy('id', 'desc')->get();
        $cs = detail_animes::where('title_anime', 'like', 'c%')->orderBy('id', 'desc')->get();
        $ds = detail_animes::where('title_anime', 'like', 'd%')->orderBy('id', 'desc')->get();
        $es = detail_animes::where('title_anime', 'like', 'e%')->orderBy('id', 'desc')->get();
        $fs = detail_animes::where('title_anime', 'like', 'f%')->orderBy('id', 'desc')->get();
        $gs = detail_animes::where('title_anime', 'like', 'g%')->orderBy('id', 'desc')->get();
        $hs = detail_animes::where('title_anime', 'like', 'h%')->orderBy('id', 'desc')->get();
        $is = detail_animes::where('title_anime', 'like', 'i%')->orderBy('id', 'desc')->get();
        $js = detail_animes::where('title_anime', 'like', 'j%')->orderBy('id', 'desc')->get();
        $ks = detail_animes::where('title_anime', 'like', 'k%')->orderBy('id', 'desc')->get();
        $ls = detail_animes::where('title_anime', 'like', 'l%')->orderBy('id', 'desc')->get();
        $ms = detail_animes::where('title_anime', 'like', 'm%')->orderBy('id', 'desc')->get();
        $ns = detail_animes::where('title_anime', 'like', 'n%')->orderBy('id', 'desc')->get();
        $os = detail_animes::where('title_anime', 'like', 'o%')->orderBy('id', 'desc')->get();
        $ps = detail_animes::where('title_anime', 'like', 'p%')->orderBy('id', 'desc')->get();
        $qs = detail_animes::where('title_anime', 'like', 'q%')->orderBy('id', 'desc')->get();
        $rs = detail_animes::where('title_anime', 'like', 'r%')->orderBy('id', 'desc')->get();
        $ss = detail_animes::where('title_anime', 'like', 's%')->orderBy('id', 'desc')->get();
        $ts = detail_animes::where('title_anime', 'like', 't%')->orderBy('id', 'desc')->get();
        $us = detail_animes::where('title_anime', 'like', 'u%')->orderBy('id', 'desc')->get();
        $vs = detail_animes::where('title_anime', 'like', 'v%')->orderBy('id', 'desc')->get();
        $ws = detail_animes::where('title_anime', 'like', 'w%')->orderBy('id', 'desc')->get();
        $xs = detail_animes::where('title_anime', 'like', 'x%')->orderBy('id', 'desc')->get();
        $ys = detail_animes::where('title_anime', 'like', 'y%')->orderBy('id', 'desc')->get();
        $zs = detail_animes::where('title_anime', 'like', 'z%')->orderBy('id', 'desc')->get();
        return view('home.list_anime')
            ->with('as', $as)
            ->with('bs', $bs)
            ->with('cs', $cs)
            ->with('ds', $ds)
            ->with('es', $es)
            ->with('fs', $fs)
            ->with('gs', $gs)
            ->with('hs', $hs)
            ->with('is', $is)
            ->with('js', $js)
            ->with('ks', $ks)
            ->with('ls', $ls)
            ->with('ms', $ms)
            ->with('ns', $ns)
            ->with('os', $os)
            ->with('ps', $ps)
            ->with('qs', $qs)
            ->with('rs', $rs)
            ->with('ss', $ss)
            ->with('ts', $ts)
            ->with('us', $us)
            ->with('vs', $vs)
            ->with('ws', $ws)
            ->with('xs', $xs)
            ->with('ys', $ys)
            ->with('zs', $zs)
            ->with('sd', $sd);
    }

    public function genres()
    {
        $genres = genres::all();
        return view('home.genres')->with('genres', $genres);
    }

    public function jadwal()
    {
        $senins = detail_animes::where('jadwal_anime', 'Senin')->orderBy('id', 'desc')->get();
        $selasas = detail_animes::where('jadwal_anime', 'Selasa')->orderBy('id', 'desc')->get();
        $rabus = detail_animes::where('jadwal_anime', 'Rabu')->orderBy('id', 'desc')->get();
        $kamiss = detail_animes::where('jadwal_anime', 'Kamis')->orderBy('id', 'desc')->get();
        $jumats = detail_animes::where('jadwal_anime', 'Jumat')->orderBy('id', 'desc')->get();
        $sabtus = detail_animes::where('jadwal_anime', 'Sabtu')->orderBy('id', 'desc')->get();
        $minggus = detail_animes::where('jadwal_anime', 'Minggu')->orderBy('id', 'desc')->get();
        $randoms = detail_animes::where('jadwal_anime', 'Random')->orderBy('id', 'desc')->get();

        return view('home.jadwal')
            ->with('senins', $senins)
            ->with('selasas', $selasas)
            ->with('rabus', $rabus)
            ->with('kamiss', $kamiss)
            ->with('jumats', $jumats)
            ->with('sabtus', $sabtus)
            ->with('minggus', $minggus)
            ->with('randoms', $randoms);
    }

    public function genre($request)
    {
        $genres = detail_animes::where('genre_anime', 'like', '%' . $request . '%')->paginate(20);
        $name_genre = $request;

        return view('home.genre')->with('genres', $genres)->with('name_genre', $name_genre)->with('title_web', $request);
    }

    public function anime($request)
    {
        $anime = detail_animes::where('id_anime', $request)->first();
        $episodes = episode_animes::where('id_anime', $request)->orderBy('episode', 'asc')->get();
        /* if (Auth::check() && $anime) {
            $list_users = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $anime->id_anime)->first();

            if ($list_users) {
                $action[0] = 'remove-list';
                $action[1] = 'Remove list';
            } else {
                $action[0] = 'add-list';
                $action[1] = 'Add list';
            }
        } else {
            $action[0] = 'add-list';
            $action[1] = 'Add list';
        } */
        return view('home.anime')->with('anime', $anime)->with('episodes', $episodes);
    }

    public function play_anime($request)
    {
        /* $episode = episode_animes::where('episode', $request)->where('from_micro', 'Y')->first();
        if(!$episode){
            $episode = episode_animes::where('episode', $request)->first();
        } */
        $episode = episode_animes::where('episode', $request)->first();
        $anime = '';
        if ($episode) {
            $anime = detail_animes::where('id_anime', $episode->id_anime)->first();
        }

        return view('home.play_anime')->with('anime', $anime)->with('episode', $episode);
    }
}
