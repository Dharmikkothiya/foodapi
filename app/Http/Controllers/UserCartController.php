<?php

namespace App\Http\Controllers;
use App\Models\UserCart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserCart::with(['user', 'food'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'UserID' => 'required|exists:users,id',
            'FoodID' => 'required|exists:foods,FoodID',
            'OrderCount' => 'required|integer|min:1',
        ]);

        return UserCart::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserCart::with(['user', 'food'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = UserCart::findOrFail($id);

        $validated = $request->validate([
            'UserID' => 'nullable|exists:users,id',
            'FoodID' => 'nullable|exists:foods,FoodID',
            'OrderCount' => 'nullable|integer|min:1',
        ]);

        $cart->update($validated);
        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = UserCart::findOrFail($id);
        $cart->delete();

        return response()->json(['message' => 'Cart item deleted successfully'], 200);
    }
}
