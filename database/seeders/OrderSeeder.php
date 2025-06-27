<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\StockItem;
use App\Models\Customer;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory()->count(150)->create();
    }
}
