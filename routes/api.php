<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/addcustomer', [CustomerController::class, 'createCustomer']);
Route::post('/updatecustomer', [CustomerController::class, 'updateCustomer']);
Route::post('/deletecustomer', [CustomerController::class, 'deleteCustomer']);
Route::post('/getcustomer', [CustomerController::class, 'getCustomer']);
Route::post('/getcustomers', [CustomerController::class, 'getCustomers']);


Route::post('/test/create', [TestController::class, 'create']);
Route::post('/test/update', [TestController::class, 'update']);
Route::post('/test/delete', [TestController::class, 'delete']);


