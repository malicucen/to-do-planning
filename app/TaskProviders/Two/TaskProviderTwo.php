<?php

namespace App\TaskProviders\Two;

use App\Data\Task\TaskCollection;
use App\TaskProviders\Adapters\TaskProviderTwoDataAdapter;
use App\TaskProviders\Contracts\TaskProviderContract;
use App\TaskProviders\TaskProvider;
use App\TaskProviders\Traits\HasJsonAPI;
use GuzzleHttp\Client;

class TaskProviderTwo extends TaskProvider implements TaskProviderContract
{
    use HasJsonAPI;

    public function __construct(
        private readonly Client                     $client,
        private readonly TaskProviderTwoDataAdapter $adapter,
    ) {
        $this->setEnabled(config('services.task_provider_two.enabled'));
    }

    public function getTaskCollection(): TaskCollection
    {
        $tasks = $this->doRequest(config('services.task_provider_two.url'));

        return $this->adapter->handle($tasks);
    }
}
