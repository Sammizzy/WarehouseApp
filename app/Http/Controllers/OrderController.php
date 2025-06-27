<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function report()
    {
        $commonOrders = DB::table('orders')
            ->join('stock_items', 'orders.stock_item_id', '=', 'stock_items.id')
            ->select('stock_items.name', DB::raw('SUM(orders.quantity) as total_ordered'))
            ->groupBy('stock_items.name')
            ->orderByDesc('total_ordered')
            ->limit(10)
            ->get();

        return view('orders.report', compact('commonOrders'));
    }

}
