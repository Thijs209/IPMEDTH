<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PopController;
use App\Models\User;

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

/* 
*  Auth Routes
*/

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

// People manager routes
Route::get('/evaluation-overview', function () {
    return Inertia::render('PopEvaluation/EvaluationOverview');
});

// POP Routes
Route::get('/create-pop', [PopController::class, 'create']);
Route::post('/create-pop', [PopController::class, 'store']);

// Temp Route for testing, with default values
// TODO remove default values in production + add permissions so only people manager can access edit page for any POP
Route::get('/evaluate-pop/users/{user_id}/pops/{pop_id?}/', function (User $user, string $pop_id) {
    if ($pop_id = null) {
        POP::where('user_id', $user->id)->firstOrFail();
    };


    return Inertia::render('PopEvaluation/EvaluatePop', [
        'user_id' => $user_id,
        'pop_id' => $pop_id
    ]);
});