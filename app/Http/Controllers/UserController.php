<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'UserName' => 'required|string|max:50',
            'Email' => 'required|email|unique:users,Email',
            'PasswordHash' => 'required|string',
            'FullName' => 'required|string|max:100',
            'PhoneNumber' => 'nullable|string|max:15',
            'UserBio' => 'nullable|string',
            'UserPhotoURL' => 'nullable|string|max:255',
        ]);

        return User::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'UserName' => 'nullable|string|max:50',
            'Email' => 'nullable|email|unique:users,Email,' . $id . ',UserID',
            'PasswordHash' => 'nullable|string',
            'FullName' => 'nullable|string|max:100',
            'PhoneNumber' => 'nullable|string|max:15',
            'UserBio' => 'nullable|string',
            'UserPhotoURL' => 'nullable|string|max:255',
        ]);

        $user->update($validated);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
