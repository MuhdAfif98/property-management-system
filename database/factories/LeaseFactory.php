<?php

namespace Database\Factories;

use App\Models\Lease;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lease>
 */
class LeaseFactory extends Factory
{
    protected $model = Lease::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => \App\Models\Property::factory(), // Associate with a property
            'client_id' => \App\Models\Client::factory(), // Associate with a client
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'monthly_rent' => $this->faker->numberBetween(500, 2000),
            'status' => $this->faker->randomElement(['active', 'expired']),
        ];
    }
}
