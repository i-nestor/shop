<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/template/css/style.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <div class="navbar-nav">
            <a class="nav-link fs-5" href="{{ route('products.index') }}">Продукты</a>
            <a class="nav-link fs-5" href="{{ route('orders.index') }}">Заказы</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
