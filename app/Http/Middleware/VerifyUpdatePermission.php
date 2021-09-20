<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;


class VerifyUpdatePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // If trying to update collection
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
}
