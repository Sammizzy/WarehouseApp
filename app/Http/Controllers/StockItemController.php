<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Models\StockItem;

class StockItemController extends Controller
{
    public function index(Request $request)
    {
        $query = StockItem::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
        }

        $stockItems = $query->orderBy('id', 'desc')->get();

        return view('stock.index', compact('stockItems'));
    }

    public function create()
    {
        $stockItem = \App\Models\StockItem::all();
        return view('stock.create', compact('stockItem'));
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

    public function edit($id)
    {
        $stockItem = \App\Models\StockItem::findOrFail($id);
        return view('stock.edit', compact('stockItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $stockItem = StockItem::findOrFail($id);
        $stockItem->update($request->only(['quantity', 'price']));

        return redirect()->route('stock.index')->with('success', 'Stock item updated.');
    }

    public function destroy($id)
    {
        $stockItem = StockItem::findOrFail($id);

        if ($stockItem->orders()->count() > 0) {
            return redirect()->route('stock.index')->with('error', 'Cannot delete: Stock item has existing orders.');
        }

        $stockItem->delete();

        return redirect()->route('stock.index')->with('success', 'Stock item deleted.');
    }




}

