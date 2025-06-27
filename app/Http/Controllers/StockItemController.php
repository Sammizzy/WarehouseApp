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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        StockItem::create($validated);

        return redirect()->route('stock.index')->with('success', 'Stock item added.');
    }

    public function edit($id)
    {
        $stockItem = StockItem::findOrFail($id);
        return view('stock.edit', compact('stockItem'));
    }

    public function update(Request $request, $id)
    {
        $stockItem = StockItem::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        $stockItem->update($validated);

        return redirect()->route('stock.index')->with('success', 'Stock item updated.');
    }
}

