<?php

namespace Database\Seeders;


use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'name' => 'Fast & Furious 9',
            'description' => 'Dom and the crew take on an international terrorist.',
            'duration' => 145.5, // in minutes
            'release_date' => '2021-06-25',
            'rating' => 7.3,
            'genre_id' => 1, // Action
            'language' => 'English',
            'cast' => 'Vin Diesel, John Cena, Michelle Rodriguez',
        ]);

        Movie::create([
            'name' => 'The Hangover',
            'description' => 'Three friends wake up from a bachelor party in Las Vegas.',
            'duration' => 100.0,
            'release_date' => '2009-06-05',
            'rating' => 7.7,
            'genre_id' => 2, // Comedy
            'language' => 'English',
            'cast' => 'Bradley Cooper, Ed Helms, Zach Galifianakis',
        ]);

        Movie::create([
            'name' => '3 Idiots',
            'description' => 'Two friends search for their long-lost companion.',
            'duration' => 170.0,
            'release_date' => '2009-12-25',
            'rating' => 8.4,
            'genre_id' => 2, // Comedy
            'language' => 'Hindi',
            'cast' => 'Aamir Khan, R. Madhavan, Sharman Joshi',
        ]);
    }
}
