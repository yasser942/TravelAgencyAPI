<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'is_public' => $this->faker->boolean,
            'slug' => $this->faker->unique()->slug,
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'number_of_days' => $this->faker->numberBetween(1, 30), // Adjust the range as needed
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
