<?php

namespace App\Repositories;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

interface DeveloperRepository
{
    public function exists(): bool;

    public function create(array $attributes): Developer;

    public function all(): Collection;
}
