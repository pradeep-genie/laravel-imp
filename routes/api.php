<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api'],function($routes){

    Route::post('/login',[UserController::class,'login']);
    Route::post('/logout',[UserController::class,'destroy']);
    Route::post('/register',[RegisterController::class,'register']);
    Route::get('/profile',[UserController::class,'profile']);
    Route::post('/profile-update',[UserController::class,'profile_update']);

});

