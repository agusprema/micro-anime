<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\list_user_animes;
use App\detail_animes;
use Analytics;

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
                $id_anime = detail_animes::where('id_anime', $id)->first();
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
}
