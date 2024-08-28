<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=> User::all("id")->random(),
            "category"=> $this->faker->sentence(2),
            "title"=> $this->faker->sentence(4), 
            "description"=> $this->faker->sentence(10),
            "content"=> implode($this->faker->paragraphs(4)), 
            "date"=> $this->faker->date(),
        ];
    }
}
