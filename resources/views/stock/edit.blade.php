@extends('layouts.app')

@section('content')
    <h2>Edit Stock Item</h2>

    <form action="{{ route('stock.update', $stockItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $stockItem->name }}" required>
        </div>

        <div class="mb-3">
            <label>Category:</label>
            <input type="text" name="category" class="form-control" value="{{ $stockItem->category }}" required>
        </div>

        <div class="mb-3">
            <label>Quantity:</label>
            <input type="number" name="quantity" class="form-control" value="{{ $stockItem->quantity }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Stock</button>
    </form>
@endsection
