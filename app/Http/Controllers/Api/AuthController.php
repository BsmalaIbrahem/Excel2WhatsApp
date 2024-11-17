<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginReuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginReuest $request)
    {
        if(!auth()->attempt($request->all())){
            return response(['success' => false, 'message' => 'password is wrong']);
        }


        return response([
            'success' => true,
            'message' => 'successfully',
            'data' => [
                'token' => $request->user()->createToken('api')->plainTextToken,
                'user' => auth()->user()
            ],
        ]);

    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response(['success' => 'true', 'message' => 'logged out']);
    }
}
