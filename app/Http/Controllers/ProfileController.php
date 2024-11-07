<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Display the profile edit form
    public function edit()
    {
        $user = Auth::user();
        return view('auth.edit', compact('user'));
    }

    // Update the profile details
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'phone_number' => 'nullable||string|max:15',
        ]);

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        // Update password only if a new one is provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Save the updated user data
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    }
}
