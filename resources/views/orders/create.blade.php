@extends('layouts.app')

@section('content')
    <h1>Создание нового заказа</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Имя клиента</label>
            <input type="text" class="px-3 form-control rounded-pill" id="customer_name" name="customer_name" required>
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Дата заказа</label>
            <input type="datetime-local" class="px-3 form-control rounded-pill" id="created_at" name="created_at" required>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Продукт</label>
            <select class="px-3 form-select rounded-pill" id="product_id" name="product_id" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} {{ number_format($product->price, 2) }} ₽
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input type="number" min="1" class="px-3 form-control rounded-pill" id="quantity" name="quantity" value="1" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="px-3 form-control rounded-4" id="comment" name="comment" rows="3"></textarea>
        </div>

        <div class="mt-4">
            <button type="submit" class="px-4 btn btn-outline-primary add-icon">&nbsp; Создать заказ</button>
            <a href="{{ route('orders.index') }}" class="px-4 btn btn-outline-warning cancel-icon">&nbsp; Отмена</a>
        </div>
    </form>
@endsection
