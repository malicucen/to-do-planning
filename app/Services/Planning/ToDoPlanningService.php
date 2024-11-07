<?php

namespace App\Services\Planning;

use App\Repositories\DeveloperRepository;
use App\Repositories\TaskRepository;
use App\Services\Planning\Strategies\AssignStrategyContract;
use Illuminate\Database\Eloquent\Collection;

class ToDoPlanningService extends ToDoPlanning
{
    public function __construct(
        private readonly AssignStrategyContract $assignStrategy,
    ) {

    }

    public function getAssignedTasks(): Collection
    {
        $tasks = app(TaskRepository::class)->all();

        if ($tasks->isEmpty()) {
            return new Collection();
        }

        $developers = app(DeveloperRepository::class)->all();

        if ($developers->isEmpty()) {
            return new Collection();
        }

        return $this->assignStrategy->assign($this, $developers, $tasks);
    }
}
