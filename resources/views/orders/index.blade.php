@extends('layouts.app')

@section('content')
    <h2>All Orders</h2>

    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Place New Order</a>
    <a href="{{ route('orders.most_ordered') }}" class="btn btn-info mb-3">View Most Ordered Products</a>

    <table class="table">
        <thead>
        <tr>
            <th>Customer</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Item Price</th>
            <th>Total</th>
            <th>Date</th>
            <th>Actions</th> {{-- New --}}
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->stockItem->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>${{ number_format($order->stockItem->price, 2) }}</td>
                <td>${{ number_format($order->quantity * $order->stockItem->price, 2) }}</td>
                <td>{{ $order->order_date }}</td>
                <td>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

