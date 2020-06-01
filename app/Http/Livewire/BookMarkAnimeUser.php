<?php

namespace App\Http\Livewire;

use App\detail_animes;
use Livewire\Component;
use App\list_user_animes;
use Illuminate\Support\Facades\Auth;

class BookMarkAnimeUser extends Component
{
    public $bookmark;

    public function RuleAnime($value)
    {
        return strtolower(str_replace(" ", "-", str_replace("`", "", str_replace("~", "", str_replace(" -", "", str_replace("'", "", preg_replace('~[\\\\/:*?!@#$%^&()"<>,|.]~', '', $value)))))));
    }

    public function mount(list_user_animes $bookmark)
    {
        $this->bookmark = $bookmark;
    }

    public function render()
    {
        return view('livewire.book-mark-anime-user');
    }

    public function delete()
    {
        $anime = detail_animes::where('id_anime', $this->RuleAnime($this->bookmark->id_anime))->first();
        $list_users = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($anime->id_anime))->first();

        if (Auth::check() && $anime && $list_users) {
            $bookmark       = list_user_animes::where('id_user', Auth::user()->id_user)->where('id_anime', $this->RuleAnime($anime->id_anime))->first();
            $bookmark->delete();
        }
    }
}
