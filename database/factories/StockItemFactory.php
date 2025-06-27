<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockItem>
 */
class StockItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' ' . $this->faker->randomElement(['Box', 'Item', 'Unit']),
            'category' => $this->faker->randomElement(['Electronics', 'Supplies', 'Furniture', 'Maintenance']),
            'quantity' => $this->faker->numberBetween(10, 500),
            'price' => $this->faker->randomFloat(2, 5, 500),

        ];
    }
}
