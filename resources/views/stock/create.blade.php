@extends('layouts.app')
@section('content')
    <h2>Add New Stock Item</h2>
    <form action="{{ route('stock.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Category:</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Quantity:</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Stock</button>
    </form>
@endsection
