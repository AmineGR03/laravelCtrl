<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $genres = Genre::factory(5)->create();

        Film::factory(10)->create()->each(function ($film) use ($genres) {
            $film->genres()->attach($genres->random(2)->pluck('id'));
        });
    }
}
