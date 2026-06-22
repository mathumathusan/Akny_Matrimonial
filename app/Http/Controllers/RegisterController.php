<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('signup');
    }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:user,email',
    //         'phone' => 'required|numeric|unique:user,phone',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     $user = Users::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     // Optionally, log the user in
    //     // auth()->login($user);

    //     return redirect('/login')->with('success', 'Registration successful!');
    // }

    public function register(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:user,email',
                'phone' => 'required|numeric|unique:user,phone',
                'password' => 'required|string|min:6',
            ]);

            // Create user
            $user = Users::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            // $user->member_id = 'AKNY' . str_pad($user->id, 6, '0', STR_PAD_LEFT);
            // $user->save();

            // Redirect to login with success alert
            return redirect('/login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {

            // If something unexpected happens
            return back()->with('error', 'Registration failed! Please try again.')
                ->withInput();
        }
    }
}
