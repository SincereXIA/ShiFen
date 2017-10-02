<?php

namespace App\Providers;

use App\Policies\AdminPolicy;
use App\Policies\UserPolicy;
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

        Gate::define('firstUserInfo', 'App\Policies\UserPolicy@firstUserInfo');
        Gate::define('showUserInfo', 'App\Policies\UserPolicy@showUserInfo');
        Gate::define('editSignTable', function ($user, $signEvent) {
            if ($signEvent->censor == $user) {
                return true;
            } elseif ($signEvent->group->adminUser == $user) {
                return true;
            }
            return false;
        });
    }
}
