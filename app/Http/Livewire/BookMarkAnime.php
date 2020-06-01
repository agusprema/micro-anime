<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\detail_animes;
use App\list_user_animes;

class BookMarkAnime extends Component
{
    public $id_anime;
    public $toogleAction;

    public function RuleAnime($value)
    {
        return strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
    }

    public function mount($id_anime)
    {
        $anime = detail_animes::where('id_anime', $this->RuleAnime($id_anime))->first();
        if($anime) {
            $this->id_anime = $this->RuleAnime($id_anime);
        }
    }

    public function render()
    {
        $this->toggleAction();
        return view('livewire.book-mark-anime');
    }

    public function toggleAction()
    {
        if (Auth::check() && $this->id_anime) {
            $list_users = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->id_anime)->first();

            if ($list_users) {
                return $this->toogleAction    = 0;
            } else {
                return $this->toogleAction    = 1;
            }
        } else {
            return $this->toogleAction    = 1;
        }
    }

    public function BookMarks()
    {
        if (Auth::check() && $this->id_anime) {
            $list_users = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->id_anime)->first();

            if ($list_users) {
                return $this->deleteTodo($this->RuleAnime($this->id_anime));
            } else {
                return $this->addTodo($this->RuleAnime($this->id_anime));
            }
        } else {
            //
        }
    }

    public function addTodo($id)
    {
        $anime = detail_animes::where('id_anime', $this->RuleAnime($id))->first();
        if (Auth::check() && $anime) {
            $bookmark               = new list_user_animes;
            $bookmark->id_user      = Auth::user()->id_user;
            $bookmark->id_anime     = $this->RuleAnime($anime->id_anime);
            $bookmark->save();
        }
    }

    public function deleteTodo($id)
    {
        $anime = detail_animes::where('id_anime', $this->RuleAnime($id))->first();
        if (Auth::check() && $anime) {
            $bookmark       = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($id))->first();
            $bookmark->delete();
        }
    }
}
