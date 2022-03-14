<?php

use Illuminate\Http\Response;

// Check API Response Function Exist
if (!function_exists('successResponse')) {
    function apiResponse($status, $message, $result = [], $otherData = [])
    {
        $response['status'] = $status;
        $response['message'] = $message;
        $response['result'] = $result;
        if (!empty($other)) {
            $response['otherData'] = $otherData;
        }
        return $response;
    }
}

// Check Send Response Function Exist
if (!function_exists('sendResponse')) {
    function sendResponse($response)
    {
        return response()->json($response, $response['status']);
    }
}

// Check Slug Function Exist
if (!function_exists('slug')) {
    function slug()
    {
        return substr(str_shuffle(config('constants.SUFFLE_STR')), 1, config('constants.SLUG_LENGTH'));
    }
}
