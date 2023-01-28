<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\{AuthAdminController,BrandController,ProductController,OrderController};
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


Route::post('admin/login', [AuthAdminController::class, 'doLogin']);

Route::group(['middleware' => ['auth:sanctum','is_admin'],'prefix' => 'admin'],function () {


     Route::post('logout', [AuthAdminController::class,'doLogout']);

    Route::apiResource('brands', BrandController::class);
    Route::apiResource('products', ProductController::class);
    Route::post('products/{id}', [ProductController::class,'update']);

    Route::get('orders', [OrderController::class,'getOrders']);
    Route::get('orders/{id}', [OrderController::class,'findOrder']);
    Route::post('change-order-status/{id}', [OrderController::class,'changeOrderStatus']);

});
