<?php

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = \App\Models\Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'date' => $this->faker->dateTime,
        ];
    }
}
