<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'publisher' => fake()->company(),
            'year' => fake()->numberBetween(1990, 2025),
            'genre' => fake()->randomElement([
                'Fiction','Non-Fiction','Sci-Fi','Fantasy','Romance','History'
            ]),
            'description' => fake()->paragraph(),
            // ini buat si cover opsional, tp biarin null dulu biar gampang
            'cover' => null,
        ];
    }
}
