<?php

namespace App\Providers;

use App;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /* 
        * Fortify routes
        */

        Fortify::loginView(function () {
            return Inertia::render('auth.login');
        });
        Fortify::registerView(function () {
            return Inertia::render('auth.register');
        });
        
        Fortify::requestPasswordResetLinkView(function () {
            return Inertia::render('auth.forgot-password');
        });
        
        Fortify::resetPasswordView(function (Request $request) {
            return Inertia::render('auth.reset-password', [
                'request' => $request
            ]);
        });
        
       /*
       * Fortify actions 
       */
        
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Restrict rate limiting to production environment
        if(App::environment('production')) {
            RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(20)->by($email.$request->ip());
        });
        }


        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}