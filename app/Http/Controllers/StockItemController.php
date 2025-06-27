<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockItem;

class StockItemController extends Controller
{
    public function index()
    {
        $stockItems = StockItem::all();
        return view('stock.index', compact('stockItems'));
    }

    public function create()
    {
        return view('stock.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
        ]);
        StockItem::create($request->all());
        return redirect()->route('stock.index');
    }

    public function edit(StockItem $stock)
    {
        return view('stock.edit', compact('stock'));
    }

    public function update(Request $request, StockItem $stock)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:0',
        ]);
        $stock->update($request->all());
        return redirect()->route('stock.index');
    }

    public function destroy(StockItem $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index');
    }
}

