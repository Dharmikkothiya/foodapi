<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::with(['user', 'restaurant', 'address', 'courier'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'UserID' => 'required|exists:users,id',
            'RestaurantID' => 'required|exists:restaurants,RestaurantID',
            'AddressID' => 'required|exists:addresses,AddressID',
            'TotalPrice' => 'required|numeric',
            'DeliveryTime' => 'required|date_format:H:i:s',
            'DeliveryPrice' => 'required|numeric',
            'ExpectedTime' => 'required|date_format:H:i:s',
            'OrderStatus' => 'required|in:Complete,Cancel,Receive,On the Way',
        ]);

        return Order::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Order::with(['user', 'restaurant', 'address', 'courier'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'UserID' => 'nullable|exists:users,id',
            'RestaurantID' => 'nullable|exists:restaurants,RestaurantID',
            'AddressID' => 'nullable|exists:addresses,AddressID',
            'TotalPrice' => 'nullable|numeric',
            'DeliveryTime' => 'nullable|date_format:H:i:s',
            'DeliveryPrice' => 'nullable|numeric',
            'ExpectedTime' => 'nullable|date_format:H:i:s',
            'OrderStatus' => 'nullable|in:Complete,Cancel,Receive,On the Way',
        ]);

        $order->update($validated);
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
