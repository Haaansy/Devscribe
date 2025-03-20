<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username|min:4|max:20',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function delete(Request $request) {
        $user = User::where('username', $request->username)->first();
        if ($user) {
            $user->delete();
            return response()->json(['message'=> 'User Successfully Deleted','user'=> $user],
            0);
        }
    }
}
