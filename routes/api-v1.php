<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OptionController;




Route::get('/products', [ProductController::class,'index']);
Route::post('/products', [ProductController::class,'store']);
Route::put('/products/{product}', [ProductController::class,'update']);
Route::get('/products/{product}', [ProductController::class,'show']);
Route::delete('/products/{product}', [ProductController::class,'destroy']);
    
/*
Route::apiResource('products',ProductsController::class)->names('api.v1.products');
*/


Route::get('/customers', [CustomerController::class,'index']);
Route::post('/customers', [CustomerController::class,'store']);
Route::get('/customers/{customer}', [CustomerController::class,'show']);
Route::put('/customers/{customer}', [CustomerController::class,'update']);
Route::delete('/customers/{customer}', [CustomerController::class,'destroy']);

    
/*
Route::apiResource('customers',CustomersController::class)->names('api.v1.customers');
*/

Route::get('/orders', [OrderController::class,'index']);
Route::post('/orders', [OrderController::class,'store']);
Route::get('/orders/{order}', [OrderController::class,'show']);
Route::put('/orders/{order}', [OrderController::class,'update']);
Route::delete('/orders/{order}', [OrderController::class,'destroy']);
 /*
Route::apiResource('orders',OrderController::class)->names('api.v1.orders');
*/