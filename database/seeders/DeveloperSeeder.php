<?php

namespace Database\Seeders;

use App\Repositories\DeveloperRepository;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(DeveloperRepository $developerRepository): void
    {
        if ($developerRepository->exists()) {
            return;
        }

        $developers = [
            ['name' => 'DEV1', 'difficulty_per_hour' => 1],
            ['name' => 'DEV2', 'difficulty_per_hour' => 2],
            ['name' => 'DEV3', 'difficulty_per_hour' => 3],
            ['name' => 'DEV4', 'difficulty_per_hour' => 4],
            ['name' => 'DEV5', 'difficulty_per_hour' => 5],
        ];

        foreach ($developers as $developer) {
            $developerRepository->create($developer);
        }
    }
}
