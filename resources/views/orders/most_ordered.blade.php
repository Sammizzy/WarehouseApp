@extends('layouts.app')

@section('content')
    <h2>Most Ordered Products</h2>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Total Orders</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($mostOrdered as $item)
            <tr>
                <td>{{ $stockItems[$item->stock_item_id]->name ?? 'Unknown' }}</td>
                <td>{{ $item->total_orders }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
