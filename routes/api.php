<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\LayoutCOntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiresource('grupos', GrupoController::class);
Route::apiresource('layout', LayoutCOntroller::class)->middleware(['auth:sanctum']);
Route::apiresource('users', UserController::class);

Route::post('/login',[AuthController::class,'login'] );
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class,'logout']);

Route::get('teste',[AuthController::class,'teste'])->middleware(['auth:sanctum']);
Route::get('tokens',[AuthController::class,'GetTokens'])->middleware(['auth:sanctum']);
