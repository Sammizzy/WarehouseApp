<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StockItem;

class StockItemSeeder extends Seeder
{
    public function run(): void
    {
        StockItem::factory()->count(150)->create();
    }
}
