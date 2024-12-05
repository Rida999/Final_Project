<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $users = User::paginate(10); // Paginate users
        return view('users.index', compact('users')); // Blade view for listing users
    }

    // Show the form for editing a specific user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user by ID
        return view('users.edit', compact('user')); // Blade view for editing
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Ensure email is unique except for the current user
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all()); // Update user data

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
