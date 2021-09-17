<?php

namespace App\Http\Middleware;

use App\Models\Api;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class MatinanceMode
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

        // Check if API is on matinance mode
        if(Api::where('configuration', 'matinance_mode')->first()->status){

            throw new HttpResponseException(
                response()->json([
                    'error' => 'matinance-mode',
                    'message' => 'El servidor se encuentra en mantenimiento'
                ], 503)
            ); 
            
        }

        return $next($request);
        
    }
}
