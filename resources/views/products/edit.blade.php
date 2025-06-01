@extends('layouts.app')

@section('content')
    <h1>Редактирование продукта</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="px-3 form-control rounded-pill" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select class="px-3 form-select rounded-pill" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="px-3 form-control rounded-4" id="description" name="description" rows="3">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена ₽</label>
            <input type="number" step="0.01" class="px-3 form-control rounded-pill" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="px-4 btn btn-outline-success save-icon">&nbsp; Сохранить</button>
            <a href="{{ route('products.index') }}" class="px-4 btn btn-outline-warning cancel-icon">&nbsp; Отмена</a>
        </div>
    </form>
@endsection
