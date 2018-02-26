<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Añado por problema  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long;
use Illuminate\Support\Facades\Schema;

//use Illuminate\Contracts\View\Factory as ViewFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Añado por problema  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long;
        Schema::defaultStringLength(191);
    }

/*
    public function boot(ViewFactory $view)
    {
        // Añado por problema  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long;
        Schema::defaultStringLength(191);

        //$view->composer('partials.forms.cat'.'App\Http\Views\Composers\CatFormComposer');
    }

*/
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
