<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Setting::factory(10)->create();
        \App\Models\Cart::factory(10)->create();
        \App\Models\Order::factory(30)->create();
        \App\Models\Book::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        
        // Seed the pivot table:
        $this->call([CategoryBookSeeder::class]);

        \App\Models\OrderItem::factory(100)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Payment::factory(10)->create();
        \App\Models\Report::factory(10)->create();
        \App\Models\Rating::factory(1000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
