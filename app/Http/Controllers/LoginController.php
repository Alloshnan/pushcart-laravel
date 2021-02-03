<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     $token = $request->user()->createToken($request->token_name);
        //     // $request->session()->regenerate();
        //     return [
        //         'token' => $token->plainTextToken
        //     ];
        // } else {
        //     return 'false';
        // }



        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return [
                    'isAdmin' => $request->user()->isAdmin()
                ];
        } else {
            return response()->json([
                'error' => 'invalid_credentials'
            ], 403);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }

}
