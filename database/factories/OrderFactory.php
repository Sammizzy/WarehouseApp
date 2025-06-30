<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\StockItem;
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
            'stock_item_id' => StockItem::inRandomOrder()->first()->id,
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 20),
            'order_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }

    public function edit($id)
    {
        $order = Order::with(['stockItem', 'customer'])->findOrFail($id);
        $stockItems = StockItem::all();
        $customers = Customer::all();

        return view('orders.edit', compact('order', 'stockItems', 'customers'));
    }


}
