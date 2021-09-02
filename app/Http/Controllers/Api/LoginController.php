<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\PermissionController;

class LoginController extends Controller
{
    public function login(Request $request, PermissionController $permissions)
    {
        $this->validateLogin($request);

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1], $remember = true)){
            return response()->json([
                'token' => $request->user()
                    ->createToken(
                        $request->device,
                        $permissions->getPermissions($request->user()->user_id)
                    )
                    ->plainTextToken,
                'message' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'unauthorized'
        ], 401);
    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'username' => 'required',
            'password' => 'required',
            'device'   => 'required',
        ]);
    }



    public function logout()
    {
        Auth::logout();
    }
}
