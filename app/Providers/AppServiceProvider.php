<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Illuminate\Support\Facades\Schema->Linea agregada para el error SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email)) esto sucede por usar MariaDB 
use Illuminate\Support\Facades\Schema;

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
        // Schema::defaultStringLength(191)->Linea agregada para el error SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email)) esto sucede por usar MariaDB 
        Schema::defaultStringLength(191);
    }
}
