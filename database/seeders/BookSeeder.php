<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $books = [
            [
              'title'=>'Avengers: Infinity War',
              'author'=>'Marvel Comics',
              'publisher'=>'Superhero Comics',
              'year'=>2018,
              'genre'=>'Superhero',
              'description'=>'Epic superhero crossover.',
            ],
            // ... tambah 10-15 sample book arrays
        ];

        foreach($books as $b) Book::create($b);
    }
}
