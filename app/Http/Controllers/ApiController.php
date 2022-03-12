<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    // Start Request
    public function __construct(Request $request)
    {
        // Create API Start Log
        Log::channel(config('filesnames.API_LOG'))->info(sprintf(
            "\n ====== API Request Start Log ====== \n URL: %s \n Header: %s \n Params: %s \n",
            url()->current(),
            stripslashes(json_encode($request->header())),
            stripslashes(json_encode($request->all())),
        ));
    }

    // End Request
    public function apiResponse($response)
    {
        // Set Default Status
        $statusOk = Response::HTTP_OK;

        // Create API End Log
        Log::channel(config('filesnames.API_LOG'))->info(sprintf(
            "\n ====== API Request End Log ====== \n Status: %d \n Final Response: %s \n",
            $statusOk,
            stripslashes(json_encode($response)),
        ));

        // Return Final Response
        return response()->json($response, $statusOk);
    }
}
