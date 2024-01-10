<?php

namespace Database\Factories;

use App\Models\ProgramCourses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramCourseTitles>
 */
class ProgramCourseTitlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'programCourse_id' => function () {
                return ProgramCourses::factory()->create()->id;
            },
            'hours_count' => $this->faker->numberBetween(1, 100),
            'requiredLevel' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
        ];
    }
}
