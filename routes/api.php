<?php

use App\Http\Controllers\foodCon;
use App\Http\Controllers\orderCon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('/getFOOD',[foodCon::class,'getFOOD']);
Route::post('/addFOOD',[foodCon::class,'addFOOD']);
Route::put('/updateFOOD/{id}',[foodCon::class,'updateFOOD']);
Route::delete('/deleteFOOD/{id}',[foodCon::class,'deleteFOOD']);
Route::get('/searchFOODid/{id}',[foodCon::class,'searchFOODid']);

Route::post('order',[orderCon::class,'order']);
Route::post('tambahitem/{id}',[orderCon::class,'tambahItem']);
Route::get('getorder/{id}',[orderCon::class,'getdetail']);
Route::get('getorder',[orderCon::class,'getdetailall']);