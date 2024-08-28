<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all('id');
        $books = Book::all('id');
        foreach ($categories as $category)
            $category->books()->attach($books->random());
        foreach ($books as $book)
            $book->categories()->attach($categories->random());
    }
}
