<?php

namespace App\TaskProviders;

class TaskProviderFactory
{
    public static function make(\App\Enums\TaskProvider $taskProvider): TaskProvider
    {
        return app($taskProvider->value);
    }
}
