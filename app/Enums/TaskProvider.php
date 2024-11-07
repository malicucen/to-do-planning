<?php

namespace App\Enums;

use App\TaskProviders\One\TaskProviderOne;
use App\TaskProviders\Two\TaskProviderTwo;

enum TaskProvider: string
{
    case PROVIDER_ONE = TaskProviderOne::class;
    case PROVIDER_TWO = TaskProviderTwo::class;
}
