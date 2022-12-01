<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadController;

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

Route::get('/ciudad',[CiudadController::class,'index']);
Route::get('/ciudad/{ciudad}',[CiudadController::class,'show']);
Route::post('/ciudad',[CiudadController::class,'store']);
Route::put('/ciudad/{ciudad}',[CiudadController::class,'update']);
Route::delete('/ciudad/{ciudad}',[CiudadController::class,'destroy']);

