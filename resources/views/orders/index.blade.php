@extends('layouts.app')

@section('content')
    <h2>All Orders</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Place New Order</a>

    <table class="table">
        <thead>
        <tr>
            <th>Customer</th>
            <th>Stock Item</th>
            <th>Quantity</th>
            <th>Order Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->stockItem->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->order_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
