@extends('layouts.app')

@section('content')
    <h2>Edit Order</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Stock Item:</label>
            <select name="stock_item_id" class="form-control">
                @foreach($stockItems as $item)
                    <option value="{{ $item->id }}" {{ $order->stock_item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Customer:</label>
            <select name="customer_id">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ $order->quantity }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
@endsection
