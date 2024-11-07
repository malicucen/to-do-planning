<?php

namespace Database\Factories;

use App\Enums\TaskProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        $providerIndex = array_rand(TaskProvider::cases());

        return [
            'name' => $this->faker->name(),
            'provider' => TaskProvider::cases()[$providerIndex],
            'provider_id' => random_int(1, 100),
            'difficulty' => random_int(1, 10),
            'estimated_duration' => random_int(1, 20),
        ];
    }
}
