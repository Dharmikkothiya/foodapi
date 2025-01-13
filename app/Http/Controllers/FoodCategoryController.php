<?php

namespace App\Http\Controllers;
use App\Models\FoodCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FoodCategory::with('restaurant')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:50',
            'RestaurantID' => 'required|exists:restaurants,RestaurantID',
        ]);

        return FoodCategory::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return FoodCategory::with('restaurant')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = FoodCategory::findOrFail($id);

        $validated = $request->validate([
            'Name' => 'nullable|string|max:50',
            'RestaurantID' => 'nullable|exists:restaurants,RestaurantID',
        ]);

        $category->update($validated);
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = FoodCategory::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Food Category deleted successfully'], 200);
    }
}
