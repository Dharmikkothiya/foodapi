<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::with('user')->get();
        return response()->json($addresses, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'UserID' => 'required|exists:users,id',
            'AddressTag' => 'required|string|max:50',
            'Address' => 'required|string',
            'Street' => 'required|string|max:100',
            'Pincode' => 'required|string|max:20',
            'Apartment' => 'nullable|string|max:100',
            'MapLocationData' => 'nullable|string',
        ]);

        $address = Address::create($validatedData);
        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address = Address::with('user')->findOrFail($id);
        return response()->json($address, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $address = Address::findOrFail($id);

        $validatedData = $request->validate([
            'AddressTag' => 'nullable|string|max:50',
            'Address' => 'nullable|string',
            'Street' => 'nullable|string|max:100',
            'Pincode' => 'nullable|string|max:20',
            'Apartment' => 'nullable|string|max:100',
            'MapLocationData' => 'nullable|string',
        ]);

        $address->update($validatedData);
        return response()->json($address, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return response()->json(['message' => 'Address deleted successfully'], 200);
    }
}
