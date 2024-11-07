<?php

namespace App\Providers;

use App\Services\Planning\Strategies\AssignStrategyContract;
use App\Services\Planning\Strategies\WorkloadAssignStrategy;
use App\TaskProviders\Adapters\TaskProviderOneDataAdapter;
use App\TaskProviders\Adapters\TaskProviderTwoDataAdapter;
use App\TaskProviders\One\TaskProviderOne;
use App\TaskProviders\Two\TaskProviderTwo;
use GuzzleHttp\Client;
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
        $this->app->singleton(TaskProviderOne::class, function () {
            return new TaskProviderOne(
                new Client([
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ]),
                new TaskProviderOneDataAdapter(),
            );
        });

        $this->app->singleton(TaskProviderTwo::class, function () {
            return new TaskProviderTwo(
                new Client([
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ]),
                new TaskProviderTwoDataAdapter(),
            );
        });

        $this->app->bind(AssignStrategyContract::class, WorkloadAssignStrategy::class);
    }
}
