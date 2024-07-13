<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Review;
use App\Models\Book;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::all();

        $users = User::all();

        foreach ($books as $book) {
            for ($i = 0; $i < 10; $i++) {
                Review::create([
                    'user_id' => $users->random()->id,
                    'book_id' => $book->id,
                    'rating' => rand(1, 5),
                    'comment' => \Faker\Factory::create()->text, 
                ]);
            }
        }
    }
}
