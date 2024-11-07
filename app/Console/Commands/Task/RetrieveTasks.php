<?php

namespace App\Console\Commands\Task;

use App\Data\Task\TaskCollection;
use App\Enums\TaskProvider;
use App\Repositories\TaskRepository;
use App\TaskProviders\TaskProviderFactory;
use Illuminate\Console\Command;

class RetrieveTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:retrieve-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(TaskRepository $taskRepository): void
    {
        foreach (TaskProvider::cases() as $provider) {
            $taskProvider = TaskProviderFactory::make($provider);

            if (!$taskProvider->isEnabled()) {
                continue;
            }

            /** @var TaskCollection $taskCollection */
            $taskCollection = $taskProvider->getTaskCollection();

            foreach ($taskCollection->getTasks() as $task) {
                $taskRepository->updateOrCreate($task);
            }
        }
    }
}
