<?php

namespace App\Services\Planning\Strategies;

use App\Models\Developer;
use App\Models\Task;
use App\Services\Planning\ToDoPlanning;
use Illuminate\Support\Collection;

class WorkloadAssignStrategy implements AssignStrategyContract
{
    public function assign(ToDoPlanning $service, Collection $developers, Collection $tasks): \Illuminate\Database\Eloquent\Collection
    {
        $dailyWorkHour = $service->getWeeklyWorkHour() / $service->getWeeklyWorkDay();

        $tasks = $tasks->map(function (Task $task) {
            $task->developer = null;
            $task->workload = $task->difficulty * $task->estimated_duration;
            return $task;
        })
            ->sortByDesc('workload');

        $developers = $developers->map(function (Developer $developer) {
            $developer->workload = 0;
            return $developer;
        })
            ->sortByDesc('difficulty_per_hour');

        $totalWorkload = $tasks->sum('workload');
        $capacityPerHour = $developers->sum('difficulty_per_hour');
        $workloadPerDev = ceil($totalWorkload / $capacityPerHour);

        $sprintStartDate = now()->addWeek()->startOfWeek();
        foreach ($developers as $developer) {
            $date = $sprintStartDate->clone();

            foreach ($tasks as $task) {
                if ($task->developer) {
                    continue;
                }

                $taskWorkloadForDev = $task->workload / $developer->difficulty_per_hour;

                if (($taskWorkloadForDev + $developer->workload) <= $workloadPerDev) {
                    $task->developer_estimation = $taskWorkloadForDev;
                    $task->developer = $developer;

                    $taskDay = $taskWorkloadForDev / $dailyWorkHour;
                    $taskDay = is_int($taskDay) ? $taskDay : floor($taskDay);

                    $task->start_date = $date->format('Y-m-d');

                    for ($a = 1; $a <= $taskDay; $a++) {
                        $date->addDay();

                        while ($date->isWeekend()) {
                            $date->addDay();
                        }
                    }

                    $task->end_date = $date->format('Y-m-d');

                    $developer->workload += $taskWorkloadForDev;
                }
            }
        }

        return $tasks;
    }
}
