<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            "payment_method"=> $this->faker->randomElement(['Credit card','Debit card','Cash']),
            "card_type"=> $this->faker->creditCardType(),
            "card_number"=> $this->faker->creditCardNumber(),
            "card_expire"=> $this->faker->creditCardExpirationDate(),
        ];
    }
}
