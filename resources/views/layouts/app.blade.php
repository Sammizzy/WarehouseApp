<!DOCTYPE html>
<html>
<head>
    <title>Warehouse Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ url('/') }}">Warehouse</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('stock.index') }}">📦 Stock</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customers.index') }}">🧑 Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">📋 Orders</a>
            </li>
        </ul>
        <div class="d-flex">
            <a href="{{ route('stock.create') }}" class="btn btn-success me-2">➕ Add Stock</a>
            <a href="{{ route('customers.create') }}" class="btn btn-success me-2">➕ Add Customer</a>
            <a href="{{ route('orders.create') }}" class="btn btn-success">➕ New Order</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
