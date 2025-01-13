<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Card::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CardTagType' => 'required|string|max:50',
            'UserID' => 'required|exists:users,id',
            'CardHolderName' => 'required|string|max:100',
            'CardNumber' => 'required|string|size:16|unique:cards,CardNumber',
            'ExpireDate' => 'required|date|after:today',
            'CVC' => 'required|integer|digits:3',
        ]);

        return Card::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Card::with('user')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $card = Card::findOrFail($id);

        $validated = $request->validate([
            'CardTagType' => 'nullable|string|max:50',
            'UserID' => 'nullable|exists:users,id',
            'CardHolderName' => 'nullable|string|max:100',
            'CardNumber' => 'nullable|string|size:16|unique:cards,CardNumber,' . $id . ',CardID',
            'ExpireDate' => 'nullable|date|after:today',
            'CVC' => 'nullable|integer|digits:3',
        ]);

        $card->update($validated);
        return $card;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $card = Card::findOrFail($id);
        $card->delete();

        return response()->json(['message' => 'Card deleted successfully'], 200);
    }
}
