<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //LOGIN API [POST]
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check student
        $user = User::where('email','=',$request->email)->first();

        if(isset($user->id))
        {
            if(Hash::check($request->password, $user->password))
            {
                // create a token 
                $token = $user->createToken('auth_token')->plainTextToken;

                if($user->hasRole('admin'))
                {
                    $role = 'admin';
                }
                elseif($user->hasRole('blogwriter'))
                {
                    $role = 'blogwriter';
                }
                else
                {
                    $role = 'user';
                }
                

                // send a response 
                return response()->json([
                    'status' => 1,
                    'message'=> 'Student logged in successfully',
                    'access_token' => $token,
                    'role' => $role,
                ]);
            }
            
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => 'Student not found !!!'
            ], 404 );
        }
    }

    // PROFILE {/profile} [GET]
    public function profile()
    {
        return response()->json([
            'status' => 1,
            'message' => 'Student Profile Information',
            'data' => auth()->user(),
            // 'role' => auth()->user->roles()->get(),
        ]);
    }

    //LOGOUT API
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'status'=>1,
            'message'=> 'Student logged out successfully'
        ]);
    }
}
