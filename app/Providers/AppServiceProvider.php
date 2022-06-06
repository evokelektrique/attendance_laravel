<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Contracts\Routing\UrlGenerator;
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
    public function boot(UrlGenerator $url)
    {
        if (\App::environment() === 'production') {
            $url->forceScheme('https');
        }

        // Modifiying MySQL
        Schema::defaultStringLength(191);

        // Could be rewritten in better shape
        Blade::if("can", function($requested_roles) {

            if(!auth()->check()) {
                return false;
            }

            $user = null;
            $user_email = auth()->user()->email;
            // Find current logged in user by his Email
            $user = User::where("email", $user_email)->first();


            $roles = explode(",", $requested_roles);

            foreach($roles as $role) {
                if($user && $role === $user->role) {
                    return true;
                }
            }

            return false;
        });
    }

}
