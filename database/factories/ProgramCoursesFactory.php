<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramCoursesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'program_id' => function () {
                return Program::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'days_count' => $this->faker->numberBetween(1, 30),
        ];
    }
}
