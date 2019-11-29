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

    public function add_list(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'login' => 'false'
            ]);
        } else {
            $validator = Validator::make(request()->all(), [
                'id_animes'  => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'login' => 'true',
                    'error' => $validator->messages()->first()
                ]);
            } else {
                $id_anime = detail_animes::where('id_anime', $request->id_animes)->first();
                if ($id_anime) {

                    $anime = list_user_animes::where('id_user', Auth::user()->id_user)->first();
                    if (in_array($request->id_animes, explode(",", $anime->id_animes))) {
                        return response()->json([
                            'login' => 'true',
                            'error' => 'true'
                        ]);
                    } else {
                        if ($anime->id_animes != "") {
                            $array_anime = "$anime->id_animes,$request->id_animes";
                        } else {
                            $array_anime = "$request->id_animes";
                        }

                        $list_anime = list_user_animes::where('id_user', Auth::user()->id_user)
                            ->update(['id_animes' => $array_anime]);

                        return response()->json([
                            'login' => 'true',
                            'error' => $validator->messages()->first()
                        ]);
                    }
                }
            }
        }
    }

    public function remove_list(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'login' => 'false'
            ]);
        } else {
            $validator = Validator::make(request()->all(), [
                'id_animes'  => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'login' => 'true',
                    'error' => $validator->messages()->first()
                ]);
            } else {
                $id_anime = detail_animes::where('id_anime', $request->id_animes)->first();
                if ($id_anime) {

                    $anime = list_user_animes::where('id_user', Auth::user()->id_user)->first();
                    if (in_array($request->id_animes, explode(",", $anime->id_animes))) {
                        $array_teman = explode(",", $anime->id_animes);

                        foreach ($array_teman as $key => $value) {
                            if ($value == $request->id_animes) {
                                unset($array_teman[$key]);
                            }
                        }

                        $array_teman_baru = implode(",", $array_teman);

                        $list_anime = list_user_animes::where('id_user', Auth::user()->id_user)
                            ->update(['id_animes' => $array_teman_baru]);

                        return response()->json([
                            'login' => 'true',
                            'error' => $validator->messages()->first()
                        ]);
                    } else {
                        return response()->json([
                            'login' => 'true',
                            'error' => 'true'
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
