<?php

namespace App\Data\Task;

class TaskCollection
{
    private array $tasks;

    public function pushTask(Task $task): static
    {
        $this->tasks[] = $task;

        return $this;
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }
}
