@extends('layouts.app')

@section('content')
    <a href="{{ route('stock.create') }}" class="btn btn-success mb-3">Add New Stock</a>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th> <!-- New -->
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stockItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td> <!-- New -->
                <td>...</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
