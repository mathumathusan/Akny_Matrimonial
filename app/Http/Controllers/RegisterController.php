<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'phone' => 'required|numeric|unique:user,phone',
            'password' => 'required|string|min:6', // need confirm password field
            'agree' => 'required|accepted'
        ]);

        $user = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Optionally, log the user in
        // auth()->login($user);

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
