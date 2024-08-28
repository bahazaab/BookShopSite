<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            "date"=> $this->faker->dateTimeBetween('-5 years'),
            "location"=> $this->faker->address(),
            "discount"=> $this->faker->randomFloat(2,0,99),
            "total"=> $this->faker->randomFloat(2,5,200),   
            "note"=> $this->faker->text(),
            "status"=> $this->faker->randomElement(['Pending','Shipped','Delivered','Canceled']),  
            "payment_method"=> $this->faker->randomElement(['Credit card','Debit card','Cash']),    
        ];
    }
}
