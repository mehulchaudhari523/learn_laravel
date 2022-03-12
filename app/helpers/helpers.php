<?php

use Illuminate\Http\Response;

// Check Success Response Function Already Exist
if (!function_exists('successResponse')) {
    function successResponse($message, $result)
    {
        return [
            'status' => Response::HTTP_OK,
            'message' => $message,
            'result' => $result,
        ];
    }
}

// Check Server Error Response Function Already Exist
if (!function_exists('serverErrorResponse')) {
    function serverErrorResponse($message)
    {
        return [
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $message,
        ];
    }
}

// Check Server Error Response Function Already Exist
if (!function_exists('customResponse')) {
    function customResponse($status, $message, $result)
    {
        return [
            'status' => $status,
            'message' => $message,
            'result' => $result,
        ];
    }
}
