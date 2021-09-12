<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\PermissionController;
use App\Models\Company;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request, PermissionController $permissions)
    {
        $this->validateLogin($request);

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1], $remember = true)){

            // Active user
            if(!$request->user()->active){
                return response()->json([
                    'error' => 'unauthorized',
                    'message' => 'El usuario esta deshabilitado'
                ], 403);
            }

            // Company
            $company = Company::where('company_id', $request->user()->company_id)->first();

            if(!$company){
                return response()->json([
                    'error' => 'not-found',
                    'message' => 'Ha ocurrido un error en el servidor'
                ], 404);
            }


            // Response
            $response = [
                'token' => $request->user()
                    ->createToken(
                        $request->device,
                        $permissions->getPermissions($request->user()->user_id)
                    )
                    ->plainTextToken,

                'name' => $request->user()->name,

                'company_id' => $company->company_id,
                'company_name' => $company->name,
            ];

            // Update last login
            $user = User::find($request->user()->user_id);
            $user->last_login = now();
            $user->save();


            return response()->json($response, 200);

        }

        return response()->json([
            'error' => 'invalid-credentials',
            'message' => 'El usuario o la contraseña son incorrectos'
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



    public function logout(Request $request)
    {
        //Auth::guard('web')->logout();

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'success'
        ], 200);

    }
}
