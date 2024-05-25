<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;

Route::get('/ping', function () : JsonResponse {
    return response()->json(['message' => 'pong']);
});

Route::get('/states', [StatesController::class, 'index']);
Route::get('/categories', [CategoriesController::class, 'index']);

Route::post('user/signup', [UserController::class, 'signup']);
Route::get('user', [UserController::class, 'index']);
Route::post('user/signin', [UserController::class, 'signin']);
Route::get('user/me', [UserController::class, 'me'])->middleware('auth:sanctum'                               );