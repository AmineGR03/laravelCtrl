<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    
    protected $model = \App\Models\Film::class;

    public function definition()
    {
        // Generer un titre, une description, une date de sortie, un directeur et une duree pour le film
        return [
            'titre' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'dateSortie' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'directeur' => $this->faker->name(),
            'duree' => $this->faker->randomNumber(2),

            
            'affiche' => 'https://placehold.co/600x400',
        ];
    }
}
