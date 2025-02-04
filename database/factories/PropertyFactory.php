<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    protected $model = Property::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Associate with a user
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'price' => $this->faker->numberBetween(1000, 10000),
            'status' => $this->faker->randomElement(['available', 'rented', 'sold']),
        ];
    }
}
