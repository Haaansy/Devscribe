<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username|min:4|max:20',
            'password' => 'required|min:6|confirmed'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        };

        throw ValidationException::withMessages([
            'credentials' => 'Invalid credentials'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}
