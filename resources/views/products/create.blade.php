@extends('layouts.app')

@section('content')
    <h1>Добавление нового продукта</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="px-3 form-control rounded-pill" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select class="px-3 form-select rounded-pill" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="px-3 form-control rounded-4" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена ₽</label>
            <input type="number" step="0.01" class="px-3 form-control rounded-pill" id="price" name="price" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="px-4 btn btn-outline-primary add-icon">&nbsp; Добавить продукт</button>
            <a href="{{ route('products.index') }}" class="px-4 btn btn-outline-warning cancel-icon">&nbsp; Отмена</a>
        </div>
    </form>
@endsection
