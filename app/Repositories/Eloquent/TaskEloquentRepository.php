<?php

namespace App\Repositories\Eloquent;

use App\Data\Task\Task;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class TaskEloquentRepository implements TaskRepository
{
    public function updateOrCreate(Task $task): \App\Models\Task
    {
        return \App\Models\Task::query()
            ->updateOrCreate([
                'provider' => $task->taskProvider,
                'provider_id' => $task->id,
            ], [
                'name' => Str::title($task->taskProvider->name) . ' ' . $task->id,
                'difficulty' => $task->difficulty,
                'estimated_duration' => $task->estimatedDuration,
            ]);
    }

    public function all(): Collection
    {
        return \App\Models\Task::query()->get();
    }
}
