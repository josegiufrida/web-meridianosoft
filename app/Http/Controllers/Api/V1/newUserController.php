<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Company;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class newUserController extends Controller
{
    public function company(Request $request){

        if(env('ADMIN') !== $request->admin){

            return response()->json([
                'error' => 'invalid-credentials',
                'message' => 'La credencial no es correcta'
            ], 401);

        }

        if(!$request->name){

            return response()->json([
                'error' => 'invalid-param',
                'message' => 'El parametro \'name\' no puede ser nulo'
            ], 400);

        }


        $api_token = Str::random(20);

        // Create new company
        $company = new Company;

        $company->name = $request->name;
        $company->api_token = $api_token;
            
        $company->save();


        return response()->json([
            'api_token' => $api_token
        ], 200);

    }



    public function user(Request $request){

        if(env('ADMIN') !== $request->admin){

            return response()->json([
                'error' => 'invalid-credentials',
                'message' => 'La credencial no es correcta'
            ], 401);

        }

        if(!$request->company_id || !$request->name || !$request->username || !$request->password || !$request->collections){

            return response()->json([
                'error' => 'invalid-param',
                'message' => 'Parametros nulos',
                'params' => [
                    'company_id', 'name', 'username', 'password', 'collections'
                ]
            ], 400);

        }


        // Create user
        $user = new User;

        $user->company_id = $request->company_id;
        $user->name       = $request->name;
        $user->username   = $request->username;
        $user->password   = Hash::make($request->password); // Save encrypted password

        $user->save();

        $user_id = $user->user_id;


        $collections_json = json_decode(str_replace("'", "\"", $request->collections));

        // Create user permissions
        foreach($collections_json as $collection){

            $collection_id = Collection::where('name', $collection)->first()->collection_id; // Get collection_id by name

            $user_permission = new UserPermission;

            $user_permission->user_id       = $user_id;
            $user_permission->collection_id = $collection_id;

            $user_permission->save();

        }

        return response()->json([
            'message' => 'success'
        ], 200);

    }
}