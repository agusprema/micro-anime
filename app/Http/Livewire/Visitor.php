<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Analytics;

class Visitor extends Component
{
    public $visitor = 0;

    public function render()
    {
        $this->visitor = Analytics::getAnalyticsService()->data_realtime->get('ga:205569282', 'rt:activeUsers')->totalsForAllResults['rt:activeUsers'];

        return view('livewire.visitor');
    }
}
