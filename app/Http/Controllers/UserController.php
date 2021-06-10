<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;
use Carbon\Carbon;


class UserController extends Controller
{
    public function login(Request $request)
    {
        
        $validate = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validate->fails()) {
            $response = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
            return response()->json($response, 200);
        } else {
            $credentials = request(['username', 'password']);
            if(!Auth::attempt($credentials)) {
                $response = [
                    'status' => 'error',
                    'msg' => 'Unathorized',
                    'errors' => null,
                    'content' => null,
                ];
                return response()->json($response, 401);
            }

            $user = User::where('username', $request->username)->first();
            if(! \Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }

            $token = $user->createToken('token-auth')->plainTextToken;
            $response = [
                'status' => 'success',
                'messege' => 'Login Sukses',
                'errors' => null,
                'status_code' => 200,
                'token' => $token,
                
            ];
            $user->last_login = Carbon::now();
            return response()->json($response, 200);
        }
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $response = [
            'status' => 'success',
            'messege' => 'Sukses Logout',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($response,200);
    }

    public function logoutall(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        $response = [
            'status' => 'success',
            'messege' => 'Logout Successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($response, 200);
    }
}
