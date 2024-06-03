<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

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
    public function checkRoles()
    {
        \Blade::if('hasPermission', function ($actionName = null) {
            $user = Auth::user();
    
            return $user->hasPermission($actionName);
        });
    }
    public function boot(): void
    {
        $this->checkRoles();

    }

}
