<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'category_id' => function () {
                return Category::factory()->create(['name' => $this->faker->randomElement(['frontend','backend','fullstack','mobile'])])->id;
            },
            'hour_count' => $this->faker->numberBetween(1, 100),
            'days_count' => $this->faker->numberBetween(1, 30),
        ];
    }
}
