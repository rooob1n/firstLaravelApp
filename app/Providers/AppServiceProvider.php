<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar',function($view){
            $archives = \App\Models\Posts::archives();
            $tags = \App\Models\Tag::has('posts')->pluck('name');
            $view->with(compact('archives','tags'));
        });
    }
}
