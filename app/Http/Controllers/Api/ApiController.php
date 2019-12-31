<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Request;
use App\list_user_animes;
use App\detail_animes;
use Analytics;
use App\amount_hot_animes;
use App\amount_hot_episodes;
use App\episode_animes;
use App\hot_animes;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function check_login()
    {
        if (!Auth::check()) {
            return response()->json([
                'login' => 'false'
            ]);
        } else {
            return response()->json([
                'login' => 'true'
            ]);
        }
    }

    public function RuleAnime($value)
    {
        $anime_hash = strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
        return $anime_hash;
    }

    public function add_list($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'login' => 'false',
                'error' => 'You must be signed.'
            ]);
        } else {
            if (!$id) {
                return response()->json([
                    'login' => 'true',
                    'error' => 'The id animes field is required.'
                ]);
            } else {
                $id_anime = detail_animes::where('id_anime', $this->RuleAnime($id))->first();
                if ($id_anime) {

                    $anime = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($id))->first();

                    if($anime){
                        return response()->json([
                            'login' => 'true',
                            'error' => 'The anime has been bookmarked.'
                        ]);
                    } else {
                        $bookmark               = new list_user_animes;
                        $bookmark->id_user      = Auth::user()->id_user;
                        $bookmark->id_anime     = $this->RuleAnime($id);
                        $bookmark->save();

                        return response()->json([
                            'login' => 'true',
                            'error' => 'false'
                        ]);
                    }
                } else {
                    return response()->json([
                        'login' => 'true',
                        'error' => 'anime not on the list.'
                    ]);
                }
            }
        }
    }

    public function remove_list($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'login' => 'false',
                'error' => 'You must be signed.'
            ]);
        } else {
            if (!$id) {
                return response()->json([
                    'login' => 'true',
                    'error' => 'The id animes field is required.'
                ]);
            } else {
                $id_anime = detail_animes::where('id_anime', $this->RuleAnime($id))->first();
                if ($id_anime) {

                    $anime = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($id))->first();
                    if ($anime) {

                        $bookmark       = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($id))->first();
                        $bookmark->delete();

                        return response()->json([
                            'login' => 'true',
                            'error' => 'false'
                        ]);
                    } else {
                        return response()->json([
                            'login' => 'true',
                            'error' => 'Anime has not been bookmarked.'
                        ]);
                    }
                }
            }
        }
    }

    public function visitor_counter()
    {
        $user = Analytics::getAnalyticsService()->data_realtime->get('ga:205569282', 'rt:activeUsers')->totalsForAllResults['rt:activeUsers'];
        /* $user = Analytics::fetchTotalVisitorsAndPageViews(Period::create(Carbon::now(), Carbon::now())); */
        $data[]['visitors'] = $user;
        return json_encode($data);
        /* return $user->toJson(); */
    }

    public function hot_views($id, $epi)
    {
        $id     = $this->RuleAnime($id);
        $epi    = $this->RuleAnime($epi);

        if($id && $epi){
            $id_anime = detail_animes::where('id_anime', $this->RuleAnime($id))->first();
            if($id_anime) {
                $episode = episode_animes::where('episode', $this->RuleAnime($epi))->first();
                $ip_ad = Request::ip();

                if($episode){
                    $query_hot2 = hot_animes::where('id_anime', $this->RuleAnime($id))->where('episode_anime', $this->RuleAnime($epi))->where('ip_address', $ip_ad)->latest()->first();

                    $ammount_anime_q = amount_hot_animes::where('id_anime', $this->RuleAnime($id))->first();
                    $ammount_episode_q = amount_hot_episodes::where('id_episode', $this->RuleAnime($epi))->first();

                    if($query_hot2) {
                        if(time() - strtotime($query_hot2->created_at) > (60*60*2)) {
                            $hot_view1                  = new hot_animes;
                            $hot_view1->id_anime        = $this->RuleAnime($id);
                            $hot_view1->episode_anime   = $this->RuleAnime($epi);
                            $hot_view1->ip_address      = $ip_ad;
                            $hot_view1->save();

                            if($ammount_anime_q) {
                                $amount_hot_animes                  = amount_hot_animes::find($ammount_anime_q->id);
                                $amount_hot_animes->amount_views    = $ammount_anime_q->amount_views + 1;
                                $amount_hot_animes->save();
                            } else {
                                $amount_hot_animes                  = new amount_hot_animes;
                                $amount_hot_animes->id_anime        = $this->RuleAnime($id);
                                $amount_hot_animes->amount_views    = 1;
                                $amount_hot_animes->save();
                            }
                            if($ammount_episode_q) {
                                $amount_hot_episodes                = amount_hot_episodes::find($ammount_episode_q->id);
                                $amount_hot_episodes->amount_views  = $ammount_episode_q->amount_views + 1;
                                $amount_hot_episodes->save();
                            } else {
                                $amount_hot_episodes                = new amount_hot_episodes;
                                $amount_hot_episodes->id_episode    = $this->RuleAnime($epi);
                                $amount_hot_episodes->amount_views  = 1;
                                $amount_hot_episodes->save();
                            }
                        }
                    } else {
                        $hot_view2                  = new hot_animes;
                        $hot_view2->id_anime        = $this->RuleAnime($id);
                        $hot_view2->episode_anime   = $this->RuleAnime($epi);
                        $hot_view2->ip_address      = $ip_ad;
                        $hot_view2->save();

                        if($ammount_anime_q) {
                            $amount_hot_animes                  = amount_hot_animes::find($ammount_anime_q->id);
                            $amount_hot_animes->amount_views    = $ammount_anime_q->amount_views + 1;
                            $amount_hot_animes->save();
                        } else {
                            $amount_hot_animes                  = new amount_hot_animes;
                            $amount_hot_animes->id_anime        = $this->RuleAnime($id);
                            $amount_hot_animes->amount_views    = 1;
                            $amount_hot_animes->save();
                        }
                        if($ammount_episode_q) {
                            $amount_hot_episodes                = amount_hot_episodes::find($ammount_episode_q->id);
                            $amount_hot_episodes->amount_views  = $ammount_episode_q->amount_views + 1;
                            $amount_hot_episodes->save();
                        } else {
                            $amount_hot_episodes                = new amount_hot_episodes;
                            $amount_hot_episodes->id_episode    = $this->RuleAnime($epi);
                            $amount_hot_episodes->amount_views  = 1;
                            $amount_hot_episodes->save();
                        }
                    }
                } else {
                    return response()->json([
                        'login' => 'false',
                        'error' => 'Episode has not found!'
                    ]);
                }
            } else {
                return response()->json([
                    'login' => 'false',
                    'error' => 'Anime has not found!'
                ]);
            }
        } else {
            return response()->json([
                'login' => 'false',
                'error' => 'The id animes or episode anime field is required.'
            ]);
        }
    }
}
