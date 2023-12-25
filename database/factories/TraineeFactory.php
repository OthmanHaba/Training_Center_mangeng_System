<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainee>
 */
class TraineeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name= $this->faker->name;
        return [
            'name' => $name,
            'phone' => $this->faker->phoneNumber,
            'grade' => 50,
            'currentCourse' => $this->faker->company,
            'user_id' => User::factory()->create(['name' => $name])

        ];
    }
}
