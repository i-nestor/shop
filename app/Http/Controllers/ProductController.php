<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller {

    /**
     * Отобразить список продуктов
     *
     * @return View
     */
    public function index(): View {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Показать форму для создания нового продукта
     *
     * @return View
     */
    public function create(): View {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Сохранить вновь созданный продукт
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Продукт успешно создан');
    }

    /**
     * Отобразить указанный продукт
     *
     * @param  Product $product
     * @return View
     */
    public function show(Product $product): View {
        return view('products.show', compact('product'));
    }

    /**
     * Показать форму редактирования указанного продукта
     *
     * @param  Product $product
     * @return View
     */
    public function edit(Product $product): View {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Обновить указанный продукт
     *
     * @param  Request $request
     * @param  Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Продукт успешно обновлен');
    }

    /**
     * Удалить указанный продукт
     *
     * @param  Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Продукт успешно удален');
    }

}
