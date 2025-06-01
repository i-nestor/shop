<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller {

    /**
     * Отобразить список заказов
     *
     * @return View
     */
    public function index(): View {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Показать форму для создания нового заказа
     *
     * @return View
     */
    public function create(): View {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    /**
     * Сохранить вновь созданный заказ
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'created_at' => 'required|date',
            'comment' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан');
    }

    /**
     * Отобразить указанный заказ
     *
     * @param  Order $order
     * @return View
     */
    public function show(Order $order): View {
        return view('orders.show', compact('order'));
    }

    /**
     * Обновить указанный заказ
     *
     * @param  Order $order
     * @return RedirectResponse
     */
    public function complete(Order $order) {
        $order->update(['status' => 'Выполнен']);
        return redirect()->route('orders.show', $order)->with('success', 'Заказ отмечен как выполненный');
    }

}
