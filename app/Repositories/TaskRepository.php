<?php

namespace App\Repositories;

use App\Data\Task\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepository
{
    public function updateOrCreate(Task $task): \App\Models\Task;

    public function all(): Collection;
}
