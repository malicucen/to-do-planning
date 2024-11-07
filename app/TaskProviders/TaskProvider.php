<?php

namespace App\TaskProviders;

abstract class TaskProvider
{
    private bool $enabled = true;

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}
