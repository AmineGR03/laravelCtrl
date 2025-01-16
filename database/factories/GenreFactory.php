<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    protected $model = \App\Models\Genre::class;

    public function definition()
    {
        // Generer un genre
        return [
            'nom' => $this->faker->word(),
        ];
    }
}
