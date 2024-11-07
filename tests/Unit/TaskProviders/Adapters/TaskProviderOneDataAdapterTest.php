<?php

namespace Tests\TaskProviders\Adapters;

use App\TaskProviders\Adapters\TaskProviderOneDataAdapter;
use App\Data\Task\TaskCollection;
use App\Enums\TaskProvider as TaskProviderEnum;
use App\Data\Task\Task;

it('tests if handle method returns a TaskCollection object with valid tasks', function () {
    $adapter = new TaskProviderOneDataAdapter();

    $tasks = [
        ['id' => 1, 'value' => 3, 'estimated_duration' => 4],
        ['id' => 2, 'value' => 5, 'estimated_duration' => 7],
    ];

    $result = $adapter->handle($tasks);

    expect($result)->toBeInstanceOf(TaskCollection::class);
    expect($result->getTasks())->toHaveCount(2);

    $task = $result->getTasks()[0];
    expect($task)->toBeInstanceOf(Task::class);
    expect($task->taskProvider)->toBe(TaskProviderEnum::PROVIDER_ONE);
    expect($task->id)->toBe(1);
    expect($task->difficulty)->toBe(3);
    expect($task->estimatedDuration)->toBe(4);
});
