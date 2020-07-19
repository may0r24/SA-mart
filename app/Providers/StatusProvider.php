<?php

namespace App\Providers;

use App\Statuses;
use Illuminate\Support\ServiceProvider;

class StatusProvider extends ServiceProvider {

    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('states', Statuses::all());
        });
    }
}
