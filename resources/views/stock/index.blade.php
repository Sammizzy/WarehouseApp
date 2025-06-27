@extends('layouts.app')

@section('content')
    <a href="{{ route('stock.create') }}" class="btn btn-success mb-3">Add New Stock</a>
    <table class="table">
        <thead>
        <tr><th>Name</th><th>Category</th><th>Quantity</th><th>Actions</th><th>Price</th></tr>
        </thead>
        <tbody>
        @foreach($stockItems as $stock)
            <tr>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->category }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>
                    <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('stock.destroy', $stock->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
