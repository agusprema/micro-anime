<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AnimeLabelHelper;
use App\amount_hot_episodes;
use App\amount_hot_animes;
use App\episode_animes;
use App\detail_animes;
use App\history_users;
use App\hot_animes;
use Request;

class History extends Component
{
    public $id_episode;
    public $id_anime;
    public $user;
    public $ip_user;

    public function RuleAnime($value)
    {
        return strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
    }

    public function mount($id_anime, $id_episode)
    {
        $anime      = detail_animes::where('id_anime', $this->RuleAnime($id_anime))->first();
        $episode    = episode_animes::where('episode', $id_episode)->first();

        if($anime && $episode && Auth::check() && Auth::user()->hasVerifiedEmail()) {
            $this->user         = Auth::user()->id_user;
        }

        if($anime && $episode) {
            $this->id_anime     = $this->RuleAnime($id_anime);
            $this->id_episode   = $id_episode;
            $this->ip_user      = Request::ip();
        }
    }

    public function render()
    {
        return view('livewire.history');
    }

    public function History()
    {
        if(Auth::check() && Auth::user()->hasVerifiedEmail() && $this->id_episode && $this->id_anime)
        {
            $history_user       = History_Users::where('id_user', $this->user)->orderBy('id', 'ASC')->limit(1)->get();
            $history_user_count = History_Users::where('id_user', $this->user)->get()->count();
            $c_hs               = History_Users::where('id_user', $this->user)->where('id_episode', $this->id_episode)->first();

            if($c_hs){
                History_Users::destroy($c_hs->id);

                $history_user_q             = new History_Users;
                $history_user_q->id_user    = $this->user;
                $history_user_q->id_episode = $this->id_episode;
                $history_user_q->save();
            } else {
                if($history_user_count > 9){
                    History_Users::destroy($history_user->id);
                }

                $history_user_q             = new History_Users;
                $history_user_q->id_user    = $this->user;
                $history_user_q->id_episode = $this->id_episode;
                $history_user_q->save();
            }
        }

        if($this->id_episode && $this->id_anime){
            $this->HotView();
        }
    }
    public function ModelHotView()
    {
        $ammount_anime      = amount_hot_animes::where('id_anime', $this->id_anime)->where('season_anime', AnimeLabelHelper::instance()->season_anime())->first();
        $ammount_episode    = amount_hot_episodes::where('id_episode', $this->id_episode)->where('season_anime', AnimeLabelHelper::instance()->season_anime())->first();

        $model_hot                  = new hot_animes;
        $model_hot->id_anime        = $this->id_anime;
        $model_hot->episode_anime   = $this->id_episode;
        $model_hot->ip_address      = $this->ip_user;
        $model_hot->season_anime    = AnimeLabelHelper::instance()->season_anime();
        $model_hot->save();

        if($ammount_anime) {
            $model_hot_animes                  = amount_hot_animes::find($ammount_anime->id);
            $model_hot_animes->amount_views    = $ammount_anime->amount_views + 1;
            $model_hot_animes->save();
        } else {
            $model_hot_animes                  = new amount_hot_animes;
            $model_hot_animes->id_anime        = $this->id_anime;
            $model_hot_animes->amount_views    = 1;
            $model_hot_animes->season_anime    = AnimeLabelHelper::instance()->season_anime();
            $model_hot_animes->save();
        }

        if($ammount_episode) {
            $model_hot_episodes                = amount_hot_episodes::find($ammount_episode->id);
            $model_hot_episodes->amount_views  = $ammount_episode->amount_views + 1;
            $model_hot_episodes->save();
        } else {
            $model_hot_episodes                = new amount_hot_episodes;
            $model_hot_episodes->id_episode    = $this->id_episode;
            $model_hot_episodes->amount_views  = 1;
            $model_hot_episodes->season_anime  = AnimeLabelHelper::instance()->season_anime();
            $model_hot_episodes->save();
        }
    }

    public function HotView()
    {
        if($this->id_episode && $this->id_anime)
        {
            $query_hot          = hot_animes::where('id_anime', $this->id_anime)->where('episode_anime', $this->id_episode)->where('ip_address', $this->ip_user)->where('season_anime', AnimeLabelHelper::instance()->season_anime())->latest()->first();

            if($query_hot) {
                if(time() - strtotime($query_hot->created_at) > (60*60*2)) {
                    return $this->ModelHotView();
                }
            } else {
                return $this->ModelHotView();
            }
        }
    }
}
