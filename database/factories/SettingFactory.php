<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user=User::factory()->create();
        return [
            "user_id"=> $user->id,
            "username"=> $this->faker->userName(),
            "email"=> $this->faker->unique()->safeEmail(),
            "phone"=> $this->faker->phoneNumber(),
            "address"=> $this->faker->address(),
            "postal_code"=> $this->faker->postcode(),
            "avatar"=> $this->faker->imageUrl(),
            "theme"=> $this->faker->randomElement(['light','dark']),
            'language'=> $this->faker->randomElement(['English','Arabic']),
        ];
    }
}
