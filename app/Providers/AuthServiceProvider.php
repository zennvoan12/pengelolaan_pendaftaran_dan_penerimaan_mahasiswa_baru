<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Pendaftars;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Notifications\ResetPassword;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function(User $user){
        return $user->role_id == 1;
        });
        
        Gate::define('pendaftar', function(User $user){
        return $user->role_id == 2;
        });

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return 'localhost:8000/reset-password?token='.$token;
        });
    }
}
