@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Заказы</h1>
        <a href="{{ route('orders.create') }}" class="px-4 btn btn-outline-primary add-icon">&nbsp; Добавить заказ</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Клиент</th>
            <th>Дата</th>
            <th>Статус</th>
            <th>Общая цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}">{{ $order->customer_name }}</a>
                </td>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>
                        <span class="px-3 badge bg-{{ $order->status == 'Новый' ? 'primary' : 'success' }}">

                            {{ $order->status }}
                        </span>
                </td>
                <td>{{ number_format($order->total_price, 2) }} ₽</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
