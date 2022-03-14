<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;

class FirstController extends ApiController
{
    // index
    public function index(Request $request)
    {
        $response = [];
        try {
            $response = apiResponse(Response::HTTP_OK, Lang::get('messages.success'));
        } catch (\Exception $ex) {
            $response = apiResponse(Response::HTTP_INTERNAL_SERVER_ERROR, $ex->getMessage());
        }
        return sendResponse($response);
    }
}
