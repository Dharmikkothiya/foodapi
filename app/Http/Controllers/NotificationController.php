<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Notification::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'UserID' => 'required|exists:users,UserID',
            'NotificationContent' => 'required|string',
        ]);

        return Notification::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Notification::with('user')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notification = Notification::findOrFail($id);

        $validated = $request->validate([
            'NotificationContent' => 'nullable|string',
        ]);

        $notification->update($validated);
        return $notification;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json(['message' => 'Notification deleted successfully'], 200);
    }
}
