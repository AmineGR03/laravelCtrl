<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = \App\Models\Review::class;

    public function definition()
    {
        return [
            'film_id' => \App\Models\Film::factory(),
            'user_id' => \App\Models\User::factory(),
            'note' => $this->faker->numberBetween(1, 5),
            'commentaire' => $this->faker->sentence(),
        ];
    }
}
