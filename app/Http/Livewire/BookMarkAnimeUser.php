<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\list_user_animes;

class BookMarkAnimeUser extends Component
{
    public function RuleAnime($value)
    {
        return strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
    }

    public function render()
    {
        return view('livewire.book-mark-anime-user');
    }

    public function deleteTodo($id)
    {
        $anime = detail_animes::where('id_anime', $this->RuleAnime($id))->first();
        $list_users = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($anime->id_anime))->first();

        if (Auth::check() && $anime && $list_users) {
            $bookmark       = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($anime->id_anime))->first();
            $bookmark->delete();
        }
    }
}
