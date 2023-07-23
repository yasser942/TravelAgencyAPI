<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Travel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $travel = Travel::factory()->create(); // Create a new Travel instance

        for ($i = 1; $i <= 5; $i++) {
            $startingDate = Carbon::now()->addDays(rand(1, 30));
            $endingDate = $startingDate->copy()->addDays(rand(1, 14));

            Tour::create([
                'id' => Str::uuid(),
                'travel_id' => $travel->id, // Assign the ID of the created Travel instance
                'name' => 'Your Tour Name ' . $i,
                'starting_date' => $startingDate,
                'ending_date' => $endingDate,
                'price' => 300, // Replace with your desired price
            ]);
        }
    }
}
