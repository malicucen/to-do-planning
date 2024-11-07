<?php

namespace App\TaskProviders\Adapters;

use App\Data\Task\Task;
use App\Data\Task\TaskCollection;
use App\Enums\TaskProvider as TaskProviderEnum;

class TaskProviderTwoDataAdapter
{
    public function handle(array $tasks): TaskCollection
    {
        $taskCollection = new TaskCollection();

        foreach ($tasks as $task) {
            $taskCollection->pushTask(
                new Task(
                    taskProvider: TaskProviderEnum::PROVIDER_TWO,
                    id: $task['id'],
                    difficulty: $task['zorluk'],
                    estimatedDuration: $task['sure'],
                )
            );
        }

        return $taskCollection;
    }
}
