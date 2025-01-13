<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Chat::with(['user', 'courier', 'restaurant'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ChatConnectorID' => 'required|exists:chat_connectors,id',
            'UserID' => 'nullable|exists:users,UserID',
            'CourierID' => 'nullable|exists:couriers,CourierID',
            'RestaurantID' => 'nullable|exists:restaurants,RestaurantID',
            'MessageListID' => 'required|string',
        ]);

        return Chat::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Chat::with(['user', 'courier', 'restaurant'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chat = Chat::findOrFail($id);

        $validated = $request->validate([
            'ChatConnectorID' => 'nullable|exists:chat_connectors,id',
            'UserID' => 'nullable|exists:users,UserID',
            'CourierID' => 'nullable|exists:couriers,CourierID',
            'RestaurantID' => 'nullable|exists:restaurants,RestaurantID',
            'MessageListID' => 'nullable|string',
        ]);

        $chat->update($validated);
        return $chat;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();

        return response()->json(['message' => 'Chat deleted successfully'], 200);
    }
}
