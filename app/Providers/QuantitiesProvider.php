<?php

namespace App\Providers;

use App\Quantities;
use Illuminate\Support\ServiceProvider;

class QuantitiesProvider extends ServiceProvider {

    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('quantities', Quantities::all());
        });
    }
}
