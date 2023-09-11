<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Paginator::useBootstrap();
        Model::unguard();

        // Gate::define('edit', function (User $user,Comment $comment){
        //     return $user->id == $comment->user_id;
        // });

        $this->app->bind('test', function () {
            return 'hi there';
        });

        app()->singleton('user', function() {
            return 'user';
        });
    }
}
