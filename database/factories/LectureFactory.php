<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecture>
 */
class LectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => 1, // ще се презапише в seeder
            'title' => $this->faker->sentence(3),
            'order' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text(100),
            'youtube_url' => 'https://www.youtube.com/embed/' . $this->faker->lexify('???????????'),
        ];
    }
}
