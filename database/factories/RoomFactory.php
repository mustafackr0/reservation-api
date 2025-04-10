<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    public function definition(): array
{
    return [
        'name' => $this->faker->word . ' Room',
        'price' => $this->faker->randomFloat(2, 100, 500),
        'type' => $this->faker->randomElement(['single', 'double', 'suite']),
        'capacity' => rand(1, 4),
        'available_count' => 5,
        'total_count' => 5,
        'description' => $this->faker->sentence,
        'image' => 'https://via.placeholder.com/300x200',
    ];
}

}
