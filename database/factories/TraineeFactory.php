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
        return [
            'name' => $this->faker->name,
            'berthDate' => $this->faker->date,
            'EducationalLevel' => 'graduated',
            'phoneNumber' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'startDate' => $this->faker->date,
            'UniqeSahapMAil' => $this->faker->unique()->companyEmail,
            'states' => $this->faker->randomElement(['approved',
                'registered',
                'approved_lated',
                'denied',
                'graduated',
                'graduated_feeble',
                'feeble',
                'Suspended',
                ]),
            'endDate' => $this->faker->date,
            'note' => $this->faker->paragraph,
        ];
    }
}
