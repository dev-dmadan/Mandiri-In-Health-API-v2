<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecretKeyIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $secretKey = env("SECRET_KEY");
        if ($request->query('SecretKey') !== $secretKey) {
            return response()->json([   
                'success' => false,
                'message' => 'Secret Key is invalid',
            ], 401);
        }

        return $next($request);
    }
}
