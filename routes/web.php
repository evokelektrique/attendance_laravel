<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Logout (Auth0)
Route::get('/logout', \Auth0\Laravel\Http\Controller\Stateful\Logout::class)->name('logout');

// Callback (Auth0)
Route::get('/auth0/callback', \Auth0\Laravel\Http\Controller\Stateful\Callback::class)->name('auth0.callback');

// Login (Auth0)
Route::get('/', \Auth0\Laravel\Http\Controller\Stateful\Login::class)->name('login');

// Dashboard
Route::middleware(["auth0.authenticate"])->group(function() {
    // Index
    Route::get('dashboard', [Controllers\DashboardController::class, "index"])
    ->name("dashboard.index");

    // Users
    Route::resource("dashboard/users", Controllers\UsersController::class);

    // Courses
    Route::resource("dashboard/courses", Controllers\CourseController::class);
    Route::post("dashboard/courses/{course}/update_users", [Controllers\CourseController::class, "update_users"])->name("course.update_users");
<<<<<<< HEAD
    Route::post("dashboard/courses/{course}/update_teacher", [Controllers\CourseController::class, "update_teacher"])->name("course.update_teacher");

    // Sessions
    Route::resource("dashboard/courses.sessions", Controllers\SessionController::class);

=======
>>>>>>> 12974a6c3b14b0a367d0d9647dfd294bb01fb326
});
