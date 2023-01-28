<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function register()
    {
        return view('front.auth.register');
    }

    public function doRegister(RegisterRequest $request)
    {

        $validated=$request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        Auth::login($user);
        return redirect('/');
    }

    public function login()
    {
        return view('front.auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)){
            return redirect()->back()->withErrors(['error-credentials' => 'user email or password is error']);
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

}
