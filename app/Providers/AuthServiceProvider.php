<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//pour visiter les parge sans rien modifier
        Gate::define('manage-users', function ($user) {
            return $user->hasAnyRole(['chef_departement', 'autor_post' , 'admin']);
        });


        Gate::define('edit-users', function ($user) {
            return $user->hasAnyRole(['chef_departement', 'autor_post' , 'admin']);
        });

        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });
    }
}
