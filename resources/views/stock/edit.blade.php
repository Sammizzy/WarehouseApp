@extends('layouts.app')

@section('content')
    <h2>Edit Stock Item</h2>

    <form action="{{ route('stock.update', $stockItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" value="{{ $stockItem->name }}" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label>Category:</label>
            <input type="text" value="{{ $stockItem->category }}" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ $stockItem->quantity }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price:</label>
            <input type="number" name="price" value="{{ $stockItem->price }}" class="form-control" step="0.01" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
