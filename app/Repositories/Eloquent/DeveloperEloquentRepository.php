<?php

namespace App\Repositories\Eloquent;

use App\Models\Developer;
use App\Repositories\DeveloperRepository;
use Illuminate\Database\Eloquent\Collection;

class DeveloperEloquentRepository implements DeveloperRepository
{
    public function exists(): bool
    {
        return Developer::query()->exists();
    }

    public function create(array $attributes): Developer
    {
        return Developer::query()->create($attributes);
    }

    public function all(): Collection
    {
        return Developer::query()->get();
    }
}
