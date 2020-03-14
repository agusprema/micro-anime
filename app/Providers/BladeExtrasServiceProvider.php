<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\control_panel;

class BladeExtrasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasrole', function ($expression) {
            if (Auth::user()) {
                if (Auth::user()->hasAnyRole($expression)) {
                    return true;
                }
            }

            return false;
        });

        Blade::if('ControlPanel', function ($name_controller) {
            $panel = control_panel::where('name_controll', $name_controller)->first();
            if($panel->status === 'true') {
                return true;
            }

            return false;
        });
    }
}
