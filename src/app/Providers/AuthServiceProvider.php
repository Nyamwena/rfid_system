<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        $this->registerPolicies();

        Gate::define('logged-in', function($user){
            return $user;
        });

        Gate::define('is-admin', function($user){
            return $user->hasAnyRole('Admin');
        });

        Gate::define('is-medical-practitioner', function($user){
            return $user->hasAnyRole(['Medical Practitioner','Admin']);
        });

        Gate::define('is-data-capture', function($user){
            return $user->hasAnyRole(['Data Capture','Admin']);
        });
    }
}
