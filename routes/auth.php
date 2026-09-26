<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\StaffLoginController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Customer Login / Register
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {


    Route::get('/register',
        [RegisteredUserController::class, 'create']
    )->name('register');



    Route::post('/register',
        [RegisteredUserController::class, 'store']
    );



    Route::get('/login',
        [AuthenticatedSessionController::class, 'create']
    )->name('login');



    Route::post('/login',
        [AuthenticatedSessionController::class, 'store']
    );



});





/*
|--------------------------------------------------------------------------
| Staff Login
|--------------------------------------------------------------------------
*/

Route::get('/stafflogin',
    [StaffLoginController::class, 'create']
)->name('staff.login');



Route::post('/stafflogin',
    [StaffLoginController::class, 'store']
)->name('staff.login.store');







/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    // Customer logout
    Route::post('/logout',
        [AuthenticatedSessionController::class, 'destroy']
    )->name('logout');



    // Staff logout (Owner / Admin)
    Route::post('/staff/logout',
        [StaffLoginController::class, 'destroy']
    )->name('staff.logout');



});