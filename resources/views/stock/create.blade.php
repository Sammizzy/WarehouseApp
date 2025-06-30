@extends('layouts.app')

@section('content')
    <h2>Create Stock Item</h2>

    <form action="{{ route('stock.store')}}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category:</label>
            <input type="text"  name="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Quantity:</label>
            <input type="number" name="quantity"  class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>
@endsection
