<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

Route::get('/forgot-password', function () {
    return Inertia::render('Auth/ForgotPassword');
});
Route::get('/success', function () {
    return Inertia::render('Auth/Success');
})->name('auth.success');


Route::get('/reset-password/{token}', function ($request) {         
    Log::info($request);
    return Inertia::render('Auth/ResetPassword', [
        'request' => $request
    ]);
})->name('password.reset');