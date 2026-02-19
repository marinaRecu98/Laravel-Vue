<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $fields = Order::fieldlabels();
        $modelMetadata = [
            'name' => 'Pedido',
            'routes' => Order::getGlobalRoutes()
        ];
        return Inertia::render('Orders/Index', [
            'rows' => $orders,
            'fields' => $fields,
            'model' => $modelMetadata
        ]);
    }

    public function create()
    {
        return Inertia::render('Orders/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|unique:orders,order_number',
            'status' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
        ]);
        Order::create($validated);
        return redirect()->route('orders.index');
    }

    public function edit(Order $order)
    {
        return Inertia::render('Orders/Edit', ['order' => $order]);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|unique:orders,order_number,' . $order->id,
            'status' => 'required|string',
            'total_amount' => 'required|numeric|min:0',
        ]);
        $order->update($validated);
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
