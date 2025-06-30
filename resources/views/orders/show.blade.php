@extends('layouts.app')

@section('content')
    <h2>Order Details</h2>

    <div class="card mb-3">
        <div class="card-body">
            <h4>Order #{{ $order->id }}</h4>

            <p><strong>Customer:</strong> {{ $order->customer->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->customer->email ?? 'N/A' }}</p>

            <p><strong>Stock Item:</strong> {{ $order->stockItem->name ?? 'N/A' }}</p>
            <p><strong>Category:</strong> {{ $order->stockItem->category ?? 'N/A' }}</p>
            <p><strong>Quantity Ordered:</strong> {{ $order->quantity }}</p>
            <p><strong>Price per Item:</strong> ${{ number_format($order->stockItem->price ?? 0, 2) }}</p>
            <p><strong>Total Price:</strong> ${{ number_format(($order->quantity * ($order->stockItem->price ?? 0)), 2) }}</p>

            <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y, g:i a') }}</p>
        </div>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
@endsection
