<?php

namespace App\Providers;

use App\Repositories\DeveloperRepository;
use App\Repositories\Eloquent\DeveloperEloquentRepository;
use App\Repositories\Eloquent\TaskEloquentRepository;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(TaskRepository::class, TaskEloquentRepository::class);
        $this->app->bind(DeveloperRepository::class, DeveloperEloquentRepository::class);
    }
}
