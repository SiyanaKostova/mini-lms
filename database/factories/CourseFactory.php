<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        return [
            'user_id' => 1, // фиксиран потребител
            'title' => $title,
            'description' => $this->faker->paragraph,
            'slug' => Str::slug($title) . '-' . Str::random(6),
        ];
    }
}
