@extends('layouts.app')

@section('content')
    <a href="{{ route('stock.create') }}" class="btn btn-success mb-3">Add New Stock</a>
    <table class="table">
        <thead>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('stock.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or category" class="form-control">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        @if(request('search'))
            <p>Showing results for: <strong>{{ request('search') }}</strong></p>
        @endif

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
                <td>
                    <a href="{{ route('stock.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('stock.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this item?')">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
