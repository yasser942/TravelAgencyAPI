<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startingDate = '2023-08-16'; // Replace with your desired starting date
        $endingDate = '2023-08-30';   // Replace with your desired ending date

        $travel = Travel::factory()->create(); // Create a new Travel instance

        Tour::create([
            'id' => Str::uuid(),
            'travel_id' => $travel->id, // Assign the ID of the created Travel instance
            'name' => 'Your Tour Name 3',
            'starting_date' => $startingDate,
            'ending_date' => $endingDate,
            'price' => 300, // Replace with your desired price
        ]);
    }
}
