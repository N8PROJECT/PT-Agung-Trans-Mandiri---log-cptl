<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CapitalBranchController;

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

Route::post('/add_data', [DeliveryController::class, 'add_data']);
Route::post('/add_branch', [CapitalBranchController::class, 'add_branch']);
Route::post('/add_user', [UserController::class, 'add_user']);
Route::get('/get/{id}', [DeliveryController::class, 'get']);