<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;

class AuthRegisterController extends Controller
{
    public function register(Request $request)
{
    try {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>'user',
        ]);

        $user->address()->create([
            'user_id' => $user->id,
            'name' => 'N/A',
            'address' => 'N/A',
            'phone' => 'N/A',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. You can now login.');
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['error' => 'An error occurred during registration. Please try again later.']);
    }
}

public function login(Request $request)
{
    // Validate the request data
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        // Authentication passed
        return redirect()->intended('/');
    }

    // Authentication failed
    return back()->withErrors(['email' => 'Invalid credentials']);
}

}
