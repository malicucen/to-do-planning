<?php

namespace App\Http\Controllers;

use App\Http\Requests\SprintRequest;
use App\Services\Planning\ToDoPlanningService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    public function __invoke(SprintRequest $request, ToDoPlanningService $planningService)
    {
        $weeklyWorkHour = $request->get('weekly_work_hour', 45);
        $weeklyWorkDay = 5;

        $tasks = $planningService
            ->setWeeklyWorkHour($weeklyWorkHour)
            ->setWeeklyWorkDay($weeklyWorkDay)
            ->getAssignedTasks();

        $totalEstimation = 0;
        $period = [];

        if (!$tasks->isEmpty()) {
            $startDate = Carbon::parse($tasks->min('start_date'))->startOfWeek();
            $endDate = Carbon::parse($tasks->max('end_date'))->endOfWeek();
            $period = CarbonPeriod::create($startDate, $endDate);

            $totalEstimation = $tasks->sum('developer_estimation');
        }

        return view('home', [
            'tasks' => $tasks,
            'week_count' => ceil($totalEstimation / $weeklyWorkHour / $weeklyWorkDay),
            'period' => $period,
        ]);
    }
}
