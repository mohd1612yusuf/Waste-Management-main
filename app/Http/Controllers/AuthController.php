<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function dashboard() {
        $user = session('user');
        $roles = json_decode($user->role, true);
        return view('dashboard', compact('user', 'roles'));
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $request->session()->put('user', $user);
            // return redirect()->route('dashbo'); 
            $roles = json_decode($user->role, true);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'wrong email or password');
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        return redirect('/');
    }

}
