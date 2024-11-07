<?php

namespace App\Services\Planning;

abstract class ToDoPlanning
{
    private int $weeklyWorkHour = 45;
    private int $weeklyWorkDay = 5;

    public function setWeeklyWorkHour(int $weeklyWorkHour): ToDoPlanning
    {
        $this->weeklyWorkHour = $weeklyWorkHour;
        return $this;
    }

    public function setWeeklyWorkDay(int $weeklyWorkDay): ToDoPlanning
    {
        $this->weeklyWorkDay = $weeklyWorkDay;
        return $this;
    }

    public function getWeeklyWorkHour(): int
    {
        return $this->weeklyWorkHour;
    }

    public function getWeeklyWorkDay(): int
    {
        return $this->weeklyWorkDay;
    }
}
