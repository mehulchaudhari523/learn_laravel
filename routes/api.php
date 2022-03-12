<?php

use App\Http\Controllers\ApiControllers\FirstController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/index', [FirstController::class, 'index']);
// Auth
Route::post('/get-auth-token', [AuthController::class, 'getAuthToken']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
