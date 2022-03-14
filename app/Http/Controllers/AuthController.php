<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends ApiController
{
    // Get Auth Token
    public function getAuthToken(Request $request)
    {
        $response = [];
        try {
            $user = new User;
            $response = $user->getAuthToken($request);
        } catch (\Exception $ex) {
            $response = apiResponse(Response::HTTP_INTERNAL_SERVER_ERROR, $ex->getMessage());
        }
        return sendResponse($response);
    }
}
