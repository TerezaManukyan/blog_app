<?php

namespace App\Providers;

use App\Http\Repository\Comment\CommentRepository;
use App\Http\Repository\Comment\ICommentRepository;
use App\Http\Repository\Post\IPostRepository;
use App\Http\Repository\Post\PostRepository;
use App\Http\Repository\User\IUserRepository;
use App\Http\Repository\User\UserRepository;
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
        $this->app->singleton(IUserRepository::class, UserRepository::class);
        $this->app->singleton(IPostRepository::class, PostRepository::class);
        $this->app->singleton(ICommentRepository::class, CommentRepository::class);
    }
}
