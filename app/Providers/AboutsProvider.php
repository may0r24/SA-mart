<?php

namespace App\Providers;

use App\About;
use Illuminate\Support\ServiceProvider;

class AboutsProvider extends ServiceProvider {

    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('abouts', About::all());
        });
    }
}
