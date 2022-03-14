<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Create API Start Log
        Log::channel(config('filesnames.API_LOG'))->info(sprintf(
            "\n ====== API Request Start Log ====== \n URL: %s \n Header: %s \n Params: %s \n",
            url()->current(),
            stripslashes(json_encode($request->header())),
            stripslashes(json_encode($request->all())),
        ));
        // Response Data
        $response = $next($request);
        // Create API End Log
        Log::channel(config('filesnames.API_LOG'))->info(sprintf(
            "\n ====== API Request End Log ====== \n Final Response: %s \n",
            stripslashes(json_encode($response->original)),
        ));

        return $response;
    }
}
