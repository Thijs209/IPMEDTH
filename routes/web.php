<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PopController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationNoteController;
use App\Models\User;
use App\Models\Pop;

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
*  AUTH
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
// Route::get('/evaluation-overview', function () {
//     return Inertia::render('PopEvaluation/EvaluationOverview', [

//     ]);
// });

Route::get('/evaluation-overview', [EvaluationController::class, 'index']);


Route::prefix('v1')-> group(function(){
    Route::apiResource('/pops', PopController::class);
    Route::apiResource('/evaluation', EvaluationNoteController::class);
});

// POP Routes
// Route::get('/create-pop', [PopController::class, 'create']);
// Route::post('/create-pop', [PopController::class, 'store']);

// Temp Route for testing, with default values
// TODO remove default values in production + add permissions so only people manager and admin roles can access evaluation page for any POP
Route::get('/evaluate-pop/users/{user_id}/pops/{pop_id?}/', function (string $user_id = "4", string $pop_id = "1") {
    if ($pop_id = null) {
        Pop::create()->id;
    };
    return Inertia::render('PopEvaluation/EvaluatePop', [
        'user_id' => $user_id,
        'pop_id' => $pop_id
    ]);
});