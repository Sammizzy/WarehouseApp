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

    public function mostOrdered()
    {
        $mostOrdered = DB::table('orders')
            ->select('stock_item_id', DB::raw('COUNT(*) as total_orders'))
            ->groupBy('stock_item_id')
            ->orderByDesc('total_orders')
            ->take(10)
            ->get();

        $stockItems = StockItem::whereIn('id', $mostOrdered->pluck('stock_item_id'))->get()->keyBy('id');

        // Corrected view name here from 'ordered.most' to 'orders.most_ordered'
        return view('orders.most_ordered', compact('mostOrdered', 'stockItems'));
    }

    // Added show method to fix undefined method error
    public function show($id)
    {
        $order = Order::with(['stockItem', 'customer'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}
