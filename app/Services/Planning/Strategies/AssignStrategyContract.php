<?php

namespace App\Services\Planning\Strategies;

use App\Services\Planning\ToDoPlanning;
use Illuminate\Support\Collection;

interface AssignStrategyContract
{
    public function assign(ToDoPlanning $service, Collection $developers, Collection $tasks): \Illuminate\Database\Eloquent\Collection;
}
