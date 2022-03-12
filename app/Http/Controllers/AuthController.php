<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            $response = serverErrorResponse($ex->getMessage());
        }
        return $this->apiResponse($response);

    }
}
