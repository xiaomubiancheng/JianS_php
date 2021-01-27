<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //mb4string 767/4
        Schema::defaultStringLength(250);

        \View::composer('layout.main', function($view){
            $user = \Auth::user();
            $view->with('user', $user);
        });

        \View::composer('layout.silder', function($view){
            $topics = \App\Http\Model\Topic::all();
            $view->with('topics', $topics);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
