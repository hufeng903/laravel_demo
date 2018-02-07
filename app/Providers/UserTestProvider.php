<?php

namespace App\Providers;

use App\Models\User;
use App\Observe\UserObserve;
use Illuminate\Support\ServiceProvider;

class UserTestProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        User::creating(function($user){
//            $user->creator_id = 100;
//        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
