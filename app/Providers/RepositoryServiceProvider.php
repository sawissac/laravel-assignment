<?php

namespace App\Providers;

use App\Repository\Post\PostRepository;
use App\Repository\Post\PostRepositoryInterface;
use App\Services\Post\PostService;
use App\Services\Post\PostServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
    }
}
