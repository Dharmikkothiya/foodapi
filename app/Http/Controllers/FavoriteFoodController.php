<?php

namespace App\Http\Controllers;
use App\Models\FavoriteFood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FavoriteFood::with(['user', 'food'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'UserID' => 'required|exists:users,id',
            'FoodID' => 'required|exists:foods,FoodID',
        ]);

        return FavoriteFood::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return FavoriteFood::with(['user', 'food'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $favoriteFood = FavoriteFood::findOrFail($id);

        $validated = $request->validate([
            'UserID' => 'nullable|exists:users,id',
            'FoodID' => 'nullable|exists:foods,FoodID',
        ]);

        $favoriteFood->update($validated);
        return $favoriteFood;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $favoriteFood = FavoriteFood::findOrFail($id);
        $favoriteFood->delete();

        return response()->json(['message' => 'Favorite food removed successfully'], 200);
    }
}
