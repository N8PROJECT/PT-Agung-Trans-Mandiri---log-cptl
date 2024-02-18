<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CapitalBranchController;
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
Route::get('/logout',[AuthenticationController::class, 'logout']);

Route::group(['middleware' => ['adminrole']], function(){
    Route::get('/admin_dashboard', [PageController::class, 'admin_page'])->middleware('check.permissions:admin_dashboard');

    Route::get('/users', [PageController::class, 'users'])->name('users')->middleware('check.permissions:capital_branch');
    Route::post('/add-user', [UserController::class, 'add_user']);
    Route::post('/edit-user', [UserController::class, 'edit_user']);
    Route::delete('/delete-user/{id}', [UserController::class, 'delete_user']);

    Route::get('/locations', [PageController::class, 'capital_branch'])->name('locations')->middleware('check.permissions:capital_branch');
    Route::post('/add-branch', [CapitalBranchController::class, 'add_branch']);
    Route::post('/edit-branch', [CapitalBranchController::class, 'edit_branch']);
    Route::delete('/delete-branch/{id}', [CapitalBranchController::class, 'delete_branch']);

    Route::get('/report_pengiriman', [PageController::class, 'report_pengiriman'])->middleware('check.permissions:report_pengiriman');
    Route::get('/export-admin', [ExportController::class, 'export_deliveries_foradmin']);
});

Route::group(['middleware' => ['courierrole']], function(){
    Route::get('/courier_dashboard', [PageController::class, 'courier_page'])->middleware('check.permissions:courier_dashboard');

    Route::get('/document_delivery', [PageController::class, 'document_delivery'])->name('document_delivery')->middleware('check.permissions:document_delivery');
    Route::post('/add-delivery', [DeliveryController::class, 'add_data']);
    Route::delete('/delete-delivery/{id}', [DeliveryController::class, 'delete_delivery']);
    Route::post('/edit-delivery', [DeliveryController::class, 'edit_delivery']);

    Route::get('/recap-pengiriman', [PageController::class, 'rekap_pengiriman'])->middleware('check.permissions:rekap_pengiriman');
    Route::get('/export', [ExportController::class, 'export_deliveries_forcourier']);
});