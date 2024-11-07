<?php

namespace Tests\TaskProviders\Adapters;

use App\Enums\TaskProvider;
use App\TaskProviders\Adapters\TaskProviderTwoDataAdapter;

it('tests if handle method returns a TaskCollection object with valid tasks', function () {
    $taskData = [
        ['id' => 1, 'zorluk' => 3, 'sure' => 30],
        ['id' => 2, 'zorluk' => 2, 'sure' => 20],
        ['id' => 3, 'zorluk' => 1, 'sure' => 10],
    ];

    $adapter = new TaskProviderTwoDataAdapter();
    $taskCollection = $adapter->handle($taskData);

    $tasks = $taskCollection->getTasks();

    expect(count($tasks))->toBe(3);

    foreach ($tasks as $index => $task) {
        expect($task->taskProvider)->toBe(TaskProvider::PROVIDER_TWO);
        expect($task->id)->toBe($taskData[$index]['id']);
        expect($task->difficulty)->toBe($taskData[$index]['zorluk']);
        expect($task->estimatedDuration)->toBe($taskData[$index]['sure']);
    }
});
