<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Idea;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // gate creation

        //role based gate
        Gate::define("admin", function (User $user): bool {
            //logic
            return (bool) $user->is_admin;
        });

        //permission
        // Gate::define("idea.delete", function (User $user, Idea $idea): bool {
        //     //logic
        //     return (bool) $user->is_admin || $user->id === $idea->user_id;
        // });

        // Gate::define("idea.edit", function (User $user, Idea $idea): bool {
        //     //logic
        //     return (bool) $user->is_admin || $user->id === $idea->user_id;
        // });


    }
}
