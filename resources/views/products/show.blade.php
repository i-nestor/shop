@extends('layouts.app')

@section('content')

    <h1 class="mb-4">Просмотр продукта</h1>

    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Название:</strong> {{ $product->name }}</p>
            <p class="card-text"><strong>Категория:</strong> {{ $product->category->name }}</p>
            <p class="card-text"><strong>Цена:</strong> {{ number_format($product->price, 2) }} ₽</p>
            <p class="card-text"><strong>Описание:</strong> {{ $product->description ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('products.index') }}" class="mt-3 px-4 btn btn-outline-secondary back-icon">&nbsp; Назад к списку продуктов</a>
        <div>
            <a href="{{ route('products.edit', $product) }}" class="p-3 btn btn-outline-success edit-icon" title="Редактировать"></a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-3 btn btn-outline-danger delete-icon" title="Удалить" onclick="return confirm('Вы действительно хотите удалить продукт?')"></button>
            </form>
        </div>
    </div>
@endsection
