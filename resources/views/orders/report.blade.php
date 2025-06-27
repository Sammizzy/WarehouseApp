@extends('layouts.app')
@section('content')
    <h2>Most Frequently Ordered Items</h2>
    <table class="table">
        <thead><tr><th>Stock Name</th><th>Total Ordered</th></tr></thead>
        <tbody>
        @foreach($commonOrders as $order)
            <tr><td>{{ $order->name }}</td><td>{{ $order->total_ordered }}</td></tr>
        @endforeach
        </tbody>
    </table>
@endsection
