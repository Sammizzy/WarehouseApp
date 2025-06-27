@extends('layouts.app')
@section('content')
    <a href="{{ route('stock.create') }}" class="btn btn-success mb-3">Add Stock</a>
    <table class="table">
        <thead>
        <tr><th>Name</th><th>Category</th><th>Quantity</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($stockItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a href="{{ route('stock.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
