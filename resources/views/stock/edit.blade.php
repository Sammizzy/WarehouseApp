@extends('layouts.app')
@section('content')
    <h2>{{ isset($stock) ? 'Edit' : 'Add' }} Stock Item</h2>
    <form action="{{ isset($stock) ? route('stock.update', $stock->id) : route('stock.store') }}" method="POST">
        @csrf
        @if(isset($stock)) @method('PUT') @endif

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $stock->name ?? '' }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Category:</label>
            <input type="text" name="category" value="{{ $stock->category ?? '' }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ $stock->quantity ?? 0 }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($stock) ? 'Update' : 'Add' }}</button>
    </form>
@endsection
