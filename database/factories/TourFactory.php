<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $starting_date = $this->faker->dateTimeBetween('-3 months', '+3 months');
        $ending_date = $this->faker->dateTimeBetween($starting_date, '+2 weeks');

        return [
            'id' => $this->faker->uuid,
            'travel_id' => function () {
                return \App\Models\Travel::factory()->create()->id;
            },
            'name' => $this->faker->sentence,
            'starting_date' => $starting_date->format('Y-n-j'), // Format as "YYYY-M-d"
            'ending_date' => $ending_date->format('Y-n-j'),    // Format as "YYYY-M-d"
            'price' => $this->faker->numberBetween(100, 1000), // Adjust the range as needed
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }

    /**
     * Ensure that the starting date is earlier than the ending date.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Tour $tour) {
            if ($tour->starting_date > $tour->ending_date) {
                $temp = $tour->starting_date;
                $tour->starting_date = $tour->ending_date;
                $tour->ending_date = $temp;
            }
        })->afterCreating(function (Tour $tour) {
            if ($tour->starting_date > $tour->ending_date) {
                $temp = $tour->starting_date;
                $tour->starting_date = $tour->ending_date;
                $tour->ending_date = $temp;
                $tour->save();
            }
        });
    }
}
