<?php

namespace App\Models;

use App\Enums\TaskProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'provider' => TaskProvider::class,
    ];
}
