<?php

namespace App\Http\Controllers;
use App\Models\OrderFood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderFood::with(['order', 'food'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'OrderID' => 'required|exists:orders,OrderID',
            'FoodID' => 'required|exists:foods,FoodID',
            'Quantity' => 'required|integer|min:1',
        ]);

        return OrderFood::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return OrderFood::with(['order', 'food'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderFood = OrderFood::findOrFail($id);

        $validated = $request->validate([
            'OrderID' => 'nullable|exists:orders,OrderID',
            'FoodID' => 'nullable|exists:foods,FoodID',
            'Quantity' => 'nullable|integer|min:1',
        ]);

        $orderFood->update($validated);
        return $orderFood;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderFood = OrderFood::findOrFail($id);
        $orderFood->delete();

        return response()->json(['message' => 'OrderFood deleted successfully'], 200);
    }
}
