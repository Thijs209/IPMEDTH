<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('admin-role', function ($request) {
            $user = Auth::user();
            return Auth::user()->role->id === 1 ? $user : null;
        });    
        
        Auth::viaRequest('people-manager-role', function ($request) {
            $user = Auth::user();
            return Auth::user()->role->id === 2 ? $user : null;
        });

    }
}