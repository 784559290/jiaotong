<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class loginControllers extends Controller
{
    public function login(){
        $input = request()->input();
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);

    }
}
