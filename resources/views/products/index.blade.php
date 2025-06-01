@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Продукты</h1>
        <a href="{{ route('products.create') }}" class="px-4 btn btn-outline-primary add-icon">&nbsp; Добавить продукт</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                </td>
                <td>{{ $product->category->name }}
                </td>
                <td>{{ number_format($product->price, 2) }} ₽</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="p-3 btn btn-sm btn-outline-success edit-icon" title="Редактировать"></a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-3 btn btn-sm btn-outline-danger delete-icon" title="Удалить" onclick="return confirm('Вы действительно хотите удалить продукт?')"></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
