@extends('layouts.app')
@section('content')
<h2>Place New Order</h2>
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Customer:</label>
        <select name="customer_id" class="form-control" required>
@foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
@endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Stock Item:</label>
        <select name="stock_item_id" class="form-control" required>
@foreach($stockItems as $stock)
                <option value="{{ $stock->id }}">{{ $stock->name }}</option>
@endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Quantity:</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Order Date:</label>
        <input type="date" name="order_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit Order</button>
</form>
@endsection
