<?php

namespace App\Http\Middleware;

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
