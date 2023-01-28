<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{

    public function doLogin(LoginRequest $request)
    {

        $credentials = $request->only(['email', 'password']);
        $credentials['is_admin']=1;

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['token' => $token], 200);

        }
        return response()->json(['message' => 'Invalid credentials'], 401);

    }

    public function doLogout(Request $request)
    {

        $user = $request->user('sanctum');

        $user->currentAccessToken()->delete();

        return $this->setCode(200)->setMessage('Successfly Logout')->send();
    }

}
