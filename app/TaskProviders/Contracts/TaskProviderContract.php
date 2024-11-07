<?php

namespace App\TaskProviders\Contracts;

use App\Data\Task\TaskCollection;

interface TaskProviderContract
{
    public function getTaskCollection(): TaskCollection;
}
