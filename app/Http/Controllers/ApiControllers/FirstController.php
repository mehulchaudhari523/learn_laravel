<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class FirstController extends ApiController
{
    // index
    public function index(Request $request)
    {
        $response = [];
        try {
            $response = successResponse('success', []);
        } catch (\Exception $ex) {
            $response = serverErrorResponse($ex->getMessage());
        }
        return $this->apiResponse($response);
    }
}
