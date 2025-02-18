<?php

use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('users', [UserController::class, 'userList']);
Route::post('users/store', [UserController::class, 'store']);
Route::post('users/store-or-update', [UserController::class, 'storeOrUpdate']);


