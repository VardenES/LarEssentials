<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Añado por problema  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long;
use Illuminate\Support\Facades\Schema;

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
