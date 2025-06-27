@extends('layouts.app')

@section('content')
    <h2>Customers</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Add New Customer</a>

    <table class="table">
        <thead>
        <tr><th>Name</th><th>Email</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
