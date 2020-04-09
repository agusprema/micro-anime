<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\history_users;
use Illuminate\Support\Facades\Auth;

class Historys extends Component
{
    public $historys = [];
    public $count;
    public function render()
    {
        if(Auth::check() && Auth::user()->hasVerifiedEmail())
        {
            $this->historys = history_users::where('id_user', Auth::user()->id_user)->orderBy('id', 'DESC')->get();
            $this->count = $this->historys->count();
        }
        return view('livewire.historys');
    }
}
