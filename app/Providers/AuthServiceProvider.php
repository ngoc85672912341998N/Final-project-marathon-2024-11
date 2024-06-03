<?php

namespace App\Providers;

use Laravel\Passport\Passport;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];


    public function boot()
    {
        Passport::tokensExpireIn(now()->addMinutes(15));
        Passport::refreshTokensExpireIn(now()->addMinutes(16));
        Passport::personalAccessTokensExpireIn(now()->addMinutes(15));
    }
}