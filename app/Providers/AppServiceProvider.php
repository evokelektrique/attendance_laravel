<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use App\Models\User;
use App\Helper;

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
        // Modifiying MySQL
        Schema::defaultStringLength(191);

        // Could be rewritten in better shape
        Blade::if("can", function($requested_role) {

            if(!auth()->check()) {
                return false;
            }

            // Find current logged in user by his Email
            $user = null;
            $user_email = auth()->user()->email;
            $user = User::where("email", $user_email)->first();

            if($user && Helper::can($user->id, $requested_role)) {
                return true;
            }

            return false;
        });
    }

}
