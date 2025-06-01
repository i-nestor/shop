@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="">Заказ #{{ $order->id }}</h1>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о заказе</h5>
            <p class="card-text"><strong>Клиент:</strong> {{ $order->customer_name }}</p>
            <p class="card-text"><strong>Дата:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
            <p class="card-text"><strong>Статус:</strong>
                <span class="badge bg-{{ $order->status == 'Новый' ? 'primary' : 'success' }}">
                    {{ $order->status }}
                </span>
            </p>
            <p class="card-text"><strong>Комментарий:</strong> {{ $order->comment ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Информация о продукте</h5>
            <p class="card-text"><strong>Продукт:</strong> {{ $order->product->name }}</p>
            <p class="card-text"><strong>Категория:</strong> {{ $order->product->category->name }}</p>
            <p class="card-text"><strong>Цена за единицу товара:</strong> {{ number_format($order->product->price, 2) }} ₽</p>
            <p class="card-text"><strong>Количество:</strong> {{ $order->quantity }}</p>
            <p class="card-text"><strong>Общая цена:</strong> {{ number_format($order->total_price, 2) }} ₽</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('orders.index') }}" class="mt-3 px-4 btn btn-outline-secondary back-icon">&nbsp; Назад к списку заказов</a>
        @if($order->status == 'Новый')
            <form action="{{ route('orders.complete', $order) }}" method="POST">
                @csrf
                <button type="submit" class="px-4 btn btn-outline-success save-icon">&nbsp; Отметить как выполненный</button>
            </form>
        @endif
    </div>
@endsection
