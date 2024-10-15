<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $priority = 1;
    public function definition(): array
    {
        return [
            //
            'title' => fake()->jobTitle(),
            'priority' => self::$priority++,
            'description' => fake()->paragraph(2),
        ];
    }
}
