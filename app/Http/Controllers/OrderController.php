<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\StockItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $orders = Order::with(['stockItem', 'customer'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $stockItems = StockItem::all();
        $customers = Customer::all();
        return view('orders.create', compact('stockItems', 'customers'));
    }

}
