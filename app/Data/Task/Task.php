<?php

namespace App\Data\Task;

use App\Enums\TaskProvider;

class Task
{
    public function __construct(
        public TaskProvider $taskProvider,
        public int          $id,
        public int          $difficulty,
        public int          $estimatedDuration,
    ) {
    }
}
