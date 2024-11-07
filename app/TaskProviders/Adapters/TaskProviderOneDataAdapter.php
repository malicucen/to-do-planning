<?php

namespace App\TaskProviders\Adapters;

use App\Data\Task\Task;
use App\Data\Task\TaskCollection;
use App\Enums\TaskProvider as TaskProviderEnum;

class TaskProviderOneDataAdapter
{
    public function handle(array $tasks): TaskCollection
    {
        $taskCollection = new TaskCollection();

        foreach ($tasks as $task) {
            $taskCollection->pushTask(
                new Task(
                    taskProvider: TaskProviderEnum::PROVIDER_ONE,
                    id: $task['id'],
                    difficulty: $task['value'],
                    estimatedDuration: $task['estimated_duration'],
                )
            );
        }

        return $taskCollection;
    }
}
