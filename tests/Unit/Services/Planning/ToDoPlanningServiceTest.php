<?php

namespace Tests\Services\Planning;

use App\Repositories\DeveloperRepository;
use App\Repositories\TaskRepository;
use App\Services\Planning\Strategies\AssignStrategyContract;
use App\Services\Planning\ToDoPlanningService;
use Illuminate\Database\Eloquent\Collection;
use Mockery;

it('getAssignedTasks returns empty collection when no tasks or developers', function () {
    $strategyMock = Mockery::mock(AssignStrategyContract::class);
    $taskRepoMock = Mockery::mock(TaskRepository::class)->shouldReceive('all')->andReturn(new Collection())->getMock();
    $developerRepoMock = Mockery::mock(DeveloperRepository::class)->shouldReceive('all')->andReturn(new Collection())->getMock();

    app()->instance(TaskRepository::class, $taskRepoMock);
    app()->instance(DeveloperRepository::class, $developerRepoMock);

    $service = new ToDoPlanningService($strategyMock);
    $result = $service->getAssignedTasks();

    expect($result->isEmpty())->toBe(true);
});

it('getAssignedTasks returns assigned tasks', function () {
    $strategyMock = Mockery::mock(AssignStrategyContract::class);
    $strategyMock->shouldReceive('assign')->andReturn(new Collection([1, 2, 3]));

    $taskRepoMock = Mockery::mock(TaskRepository::class)->shouldReceive('all')->andReturn(new Collection([1, 2, 3]))->getMock();
    $developerRepoMock = Mockery::mock(DeveloperRepository::class)->shouldReceive('all')->andReturn(new Collection([1, 2, 3]))->getMock();

    app()->instance(TaskRepository::class, $taskRepoMock);
    app()->instance(DeveloperRepository::class, $developerRepoMock);

    $service = new ToDoPlanningService($strategyMock);
    $result = $service->getAssignedTasks();

    expect($result->toArray())->toBe([1, 2, 3]);
});
