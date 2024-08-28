<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bookName = $this->faker->sentence();
        $bookCategory = str_split($bookName, 5)[0];
        return [
            "name" => $bookName,
            "author" => $this->faker->name(),
            "description" => $this->faker->paragraph(),
            "image_url" => $this->faker->imageUrl(100, 150, $bookCategory),
            "publication_date" => $this->faker->date(),
            "price" => $this->faker->randomFloat(2, 5, 200),
            "discount" => $this->faker->randomFloat(2, 1, 99),
            "quantity_discount" => $this->faker->randomFloat(2, 1, 99),
            "quantity_for_discount" => $this->faker->numberBetween(0, 11),
        ];
    }
}
