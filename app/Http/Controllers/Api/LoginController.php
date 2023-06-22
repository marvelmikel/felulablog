<?php

namespace App\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Modules\Account\Entities\Account;
use Modules\Account\Events\AccountLoginEvent;


class LoginController extends Controller
{
    /**
     * Login
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email )->first();

        // Check password
        if(!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'status' => 'error',
                'message' => 'Incorrect password or email'
            ], 422);
        }


        // TODO send another verification email
        if (!$user->hasVerifiedEmail()) {
            return response([
                'status' => 'error',
                'message' => 'Please check your inbox for email verification'
            ], 423);
        }

        $token = $user->createToken(env('TOKEN_SECRET_PHRASE', 'influenzit'))->plainTextToken;



        $user = User::where('email', $request->email)->first();

      

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response([
            'status' => 'success',
            'message' => 'Login successfull',
            'data' => $response
        ], 201);
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['status' => 'success', 'message' => 'Successfully logged out']);
    }

   


    /**
     * Get User
     */
    public function me()
    {
        return response([
            'status' => 'success',
            'message' => 'User retrieved successfully',
            'data' => Auth::user()
        ], 200);
    }
    

}
