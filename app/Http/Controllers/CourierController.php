<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Courier::with('chat')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'ProfilePhotoURL' => 'nullable|string|max:255',
            'PhoneNumber' => 'required|string|max:15',
            'ChatID' => 'nullable|exists:chats,ChatID',
        ]);

        return Courier::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Courier::with('chat')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $courier = Courier::findOrFail($id);

        $validated = $request->validate([
            'Name' => 'nullable|string|max:100',
            'ProfilePhotoURL' => 'nullable|string|max:255',
            'PhoneNumber' => 'nullable|string|max:15',
            'ChatID' => 'nullable|exists:chats,ChatID',
        ]);

        $courier->update($validated);
        return $courier;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();

        return response()->json(['message' => 'Courier deleted successfully'], 200);
    }
}
