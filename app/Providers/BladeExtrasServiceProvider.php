<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\control_panel;
use Akaunting\Setting\Facade as Setting;

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

        Blade::if('hasroles', function ($expression) {
            if (Auth::user()) {
                if (Auth::user()->hasAnyRoles($expression)) {
                    return true;
                }
            }

            return false;
        });

        Blade::if('Settings', function ($name_controller, $status) {
            /* $panel = control_panel::where('name_controll', $name_controller)->first();
            if($panel->status === 'true') {
                return true;
            } */
            if(Setting::get($name_controller) === $status) {
                return true;
            }

            return false;
        });
    }
}
