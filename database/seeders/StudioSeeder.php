<?php

namespace Database\Seeders;

use App\Models\Studio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie_studios = [
            "Warner Bros.",
            "Universal Pictures",
            "20th Century Studios",
            "Columbia Pictures",
            "Paramount Pictures",
            "Sony Pictures",
            "Metro-Goldwyn-Mayer (MGM)",
            "DreamWorks Pictures",
            "Lionsgate",
            "Focus Features"
        ];
        foreach ($movie_studios as $studio) {
            Studio::create(['name' => $studio]);
        }
    }
}
