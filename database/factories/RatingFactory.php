<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id'=> Book::all("id")->random(),
            'user_id'=> User::all("id")->random(),
            'stars_number'=> $this->faker->numberBetween(1,5),
            'comment'=> $this->faker->text(1000),
        ];
    }
}
