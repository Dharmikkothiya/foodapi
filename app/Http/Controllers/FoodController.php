<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Food::with(['category', 'restaurant'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Details' => 'nullable|string',
            'Rate' => 'nullable|numeric|min:0|max:5',
            'Size' => 'nullable|string|max:20',
            'Price' => 'required|numeric|min:0',
            'IngredientsListID' => 'nullable|string',
            'CategoryID' => 'required|exists:food_categories,CategoryID',
            'RestaurantID' => 'required|exists:restaurants,RestaurantID',
        ]);

        return Food::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Food::with(['category', 'restaurant'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $food = Food::findOrFail($id);

        $validated = $request->validate([
            'Name' => 'nullable|string|max:100',
            'Details' => 'nullable|string',
            'Rate' => 'nullable|numeric|min:0|max:5',
            'Size' => 'nullable|string|max:20',
            'Price' => 'nullable|numeric|min:0',
            'IngredientsListID' => 'nullable|string',
            'CategoryID' => 'nullable|exists:food_categories,CategoryID',
            'RestaurantID' => 'nullable|exists:restaurants,RestaurantID',
        ]);

        $food->update($validated);
        return $food;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return response()->json(['message' => 'Food deleted successfully'], 200);
    }
}
