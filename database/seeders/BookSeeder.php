<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::factory()->count(10)->create();

        // 2) Sample books 
        $books = [
            [
                'title' => 'Avengers: Infinity War',
                'author' => 'Marvel Comics',
                'publisher' => 'Superhero Comics',
                'year' => 2018,
                'genre' => 'Superhero',
                'description' => 'Epic superhero crossover.',
                'cover' => null,
            ],
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year' => 2005,
                'genre' => 'Drama',
                'description' => 'Kisah persahabatan anak-anak Belitung.',
                'cover' => null,
            ],
            // tambah sample lain kalo mau
        ];

        foreach ($books as $b) {
            Book::create($b);
        }
    }
}
