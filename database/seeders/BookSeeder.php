<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'title' => $faker->sentence(3),
                'author' => $faker->name(),
                'genre' => $faker->word(),
                'publisher' => $faker->company(),
            ]);
        }

        $books = [
            [
                'title' => 'Avengers: Infinity War',
                'author' => 'Marvel Comics',
                'publisher' => 'Superhero Comics',
                'year' => 2018,
                'genre' => 'Superhero',
                'description' => 'Epic superhero crossover.',
            ],
            // ... tambah 10-15 sample book arrays
        ];

        foreach ($books as $b) Book::create($b);
    }
}
