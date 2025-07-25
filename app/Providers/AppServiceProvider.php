<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Schema::defaultStringLength(191);
        
        Gate::define('can-crud', function($user){
            return $user->role === 'Admin';
        });
        // Gate::define('can-edit-profile', function($user){
        //     return $user->id;
        // });
    }
}
