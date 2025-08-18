<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('user.auth.login');
    }

    public function login(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
}
