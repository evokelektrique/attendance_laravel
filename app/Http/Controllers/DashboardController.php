<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller {

    /**
     * Display dashboard index and register current logged in user from Auth0
     *
     * @param  Request $request
     * @return
     */
    public function index(Request $request) {
        $email = auth()->user()->email;
        $name  = auth()->user()->nickname; // or "name"

        $user = User::firstOrCreate([
            "name" => $name,
            "email" => $email
        ]);

        return view("dashboard");
    }

}
