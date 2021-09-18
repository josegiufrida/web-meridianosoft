<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class VerifyPermission
{
    /**
     * Verify if authenticated user have access to a collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $ability_name)
    {

        // If trying to update collection
        if($ability_name === 'update'){

            $api_token = $request->bearerToken();

            // Each company have specific api token to update collections, not Sanctum auth
            $company = Company::where('api_token', $api_token)->first();

            if($company){
                if($company->update_active){

                    // Add company data to $request
                    $request->company_data = $company;

                    return $next($request);

                }
            }

            throw new HttpResponseException(
                response()->json([
                    'error' => 'unauthenticated',
                    'message' => 'Usuario no autenticado'
                ], 403)
            );
            
        }


        // If trying to query a collection
        // Verify permission
        if ($request->user()->tokenCan($ability_name)) {
            return $next($request);
        }

        throw new HttpResponseException(
            response()->json([
                'error' => 'unauthorized',
                'message' => 'No posee permisos para acceder a este recurso'
            ], 403)
        ); 
    }
}
