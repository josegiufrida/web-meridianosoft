<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\V1\FilterController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Company;
use App\Models\Collection;
use App\Models\CollectionUpdate;
use App\Models\User;
use App\Models\UserPermission;



class LoginController extends Controller
{
    public function login(LoginRequest $request, FilterController $filterController)
    {

        // If Auth Attemp Fail
        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1], $remember = true)){
            
            return response()->json([
                'error' => 'invalid-credentials',
                'message' => 'El usuario o la contraseña no son correctos'
            ], 401);

        }


        $user_id    = $request->user()->user_id;
        $company_id = $request->user()->company_id;


        // Company
        // query_active === true
        $company = Company::where('company_id', $company_id)
            ->where('query_active', 1)
            ->first();

        if(!$company){

            // Log-out
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'error' => 'not-found',
                'message' => 'Ha ocurrido un error en el servidor'
            ], 404);

        }


        // Data of collections
        // Only collections that user have access
        $collections = [];       

        // Set abilities for token
        // Used for verify if user have access to query a collection -> tokenCan('...')
        // ['clientes', 'proveedores', ...];
        $abilities = [];


        // Get user permissions 
        // access === true
        $user_permissions = UserPermission::where('user_id', $user_id)->where('access', 1)->get();
        

        if(!$user_permissions){

            // Log-out
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'error' => 'not-found',
                'message' => 'Ha ocurrido un error en el servidor'
            ], 404);

        }


        foreach($user_permissions as $permission){

            $collection = $permission->collection;

            // Last time collection records was updated
            $collection_records = CollectionUpdate::where('company_id', $company_id)
                ->where('collection_id', $collection->collection_id)
                ->first();

            $collection_records_was_updated_at = $collection_records ? $collection_records->updated_at : null;

            
            array_push($collections, [
                'collection_id' => $collection->collection_id,
                'name' => $collection->name,
                'title' => $collection->title,
                'search' => "v1.0/$collection->name",
                'filters' => "v1.0/filtros/$collection->name",
                'title_field' => $filterController->titleColumn($collection->name),
                'updated_at' => $collection_records_was_updated_at,
                'primary_key' => $collection->primary_key
            ]);

            
            array_push($abilities, $collection->name);

        }


        // Response
        $response = [
            'token' => $request->user()
                ->createToken(
                    $request->device,
                    $abilities
                )
                ->plainTextToken,

            'name' => $request->user()->name,

            'company_id' => $company->company_id,
            'company_name' => $company->name,

            'collections' => $collections
        ];


        // Update last log-in
        $user = User::find($user_id);
        $user->last_login = now();
        $user->save();

        return response()->json($response, 200);

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
