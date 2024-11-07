<?php

namespace App\TaskProviders\One;

use App\Data\Task\TaskCollection;
use App\TaskProviders\Adapters\TaskProviderOneDataAdapter;
use App\TaskProviders\Contracts\TaskProviderContract;
use App\TaskProviders\TaskProvider;
use App\TaskProviders\Traits\HasJsonAPI;
use GuzzleHttp\Client;

class TaskProviderOne extends TaskProvider implements TaskProviderContract
{
    use HasJsonAPI;

    public function __construct(
        private readonly Client                     $client,
        private readonly TaskProviderOneDataAdapter $adapter,
    ) {
        $this->setEnabled(config('services.task_provider_one.enabled'));
    }

    public function getTaskCollection(): TaskCollection
    {
        $tasks = $this->doRequest(config('services.task_provider_one.url'));

        return $this->adapter->handle($tasks);
    }
}
