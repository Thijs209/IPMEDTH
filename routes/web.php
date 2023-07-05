<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PopController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationNoteController;
use App\Models\User;
use App\Models\Evaluation;
use App\Models\Pop;
use GuzzleHttp\Psr7\Request;

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


// Route::prefix('v1')-> group(function(){
//     Route::apiResource('/pops', PopController::class);
//     Route::apiResource('/evaluation', EvaluationNoteController::class);
// });

/* 
*  POP - EMPLOYEE ROUTES
*/
Route::get('/create-pop', [PopController::class, 'create']);
Route::post('/post-pop', [PopController::class, 'store']);
Route::get('/pops', [PopController::class, 'popOverview'])->name('pops');
Route::post('pop-finished/{id}', [PopController::class, 'popFinished']);
Route::get('/viewPop/{id}', [PopController::class, 'show']);
Route::get('/create-pop/{id}', [PopController::class, 'edit']);

//Task routes
Route::get('/index{popId}', function (Request $request, string $popId) {
    return 'Tasks ' . $popId;
});

/* 
*  POP - PEOPLE MANAGER (EVALUATION) ROUTES
*/

Route::get('/evaluation-overview', [EvaluationController::class, 'index'])->can('viewAny', Evaluation::class)->name('evaluation-overview');
Route::get('/evaluation/{pop_id}', [EvaluationController::class, 'show'])->can('view', Evaluation::class)->name('pop-review');
Route::post('/evaluation/{pop_id}/notes', [EvaluationNoteController::class, 'store'])->can('update', Evaluation::class)->name('evaluation-notes');


// Temp Route for testing, with default values
// TODO remove default values in production + add permissions so only people manager and admin roles can access evaluation page for any POP
Route::get('/evaluate-pop/users/{user_id}/pops/{pop_id?}/', function (string $user_id, string $pop_id) {
    if ($pop_id = null) {
        Pop::create()->id;
    };
    return Inertia::render('PopEvaluation/EvaluatePop', [
        'user_id' => $user_id,
        'pop_id' => $pop_id
    ]);
})->can('view', Evaluation::class)->name('evaluate-pop');