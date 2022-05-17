<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Logout
Route::get('/logout', \Auth0\Laravel\Http\Controller\Stateful\Logout::class)->name('logout');
// Callback
Route::get('/auth0/callback', \Auth0\Laravel\Http\Controller\Stateful\Callback::class)->name('auth0.callback');
// Login
Route::get('/', \Auth0\Laravel\Http\Controller\Stateful\Login::class)->name('login');

// Dashboard
Route::middleware(["auth0.authenticate"])->group(function() {
    // Index
    Route::get('dashboard', [Controllers\DashboardController::class, "index"]);
    Route::resource("dashboard/users", Controllers\UsersController::class);
});
