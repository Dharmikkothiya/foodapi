<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Restaurant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Intro' => 'nullable|string',
            'Rate' => 'nullable|numeric|min:0|max:5',
            'PhotosURL' => 'nullable|string',
            'AddressID' => 'required|integer',
        ]);

        return Restaurant::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Restaurant::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $validated = $request->validate([
            'Name' => 'nullable|string|max:100',
            'Intro' => 'nullable|string',
            'Rate' => 'nullable|numeric|min:0|max:5',
            'PhotosURL' => 'nullable|string',
            'AddressID' => 'nullable|integer',
        ]);

        $restaurant->update($validated);
        return $restaurant;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return response()->json(['message' => 'Restaurant deleted successfully'], 200);
    }
}
