<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'login_page']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/admin', [PageController::class, 'admin_page']);
Route::get('/courier', [PageController::class, 'courier_page']);