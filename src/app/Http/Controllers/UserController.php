<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        // Logic to show user profile
        return view('profile.show');
    }

    public function update(Request $request)
    {
        // Logic to update user profile
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('user.show')->with('success', 'Profile updated successfully.');
    }
}
