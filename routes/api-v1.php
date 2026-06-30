<?php

use App\Http\Controllers\ConsultasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OptionsController;



Route::post('/products', [ProductsController::class,'store']);
Route::get('/products', [ProductsController::class,'index']);
Route::put('/products/{products}', [ProductsController::class,'update']);
Route::get('/products/{products}', [ProductsController::class,'show']);
Route::delete('/products/{products}', [ProductsController::class,'destroy']);
    
/*
Route::apiResource('products',ProductsController::class)->names('api.v1.products');
*/
 
Route::get('/customers', [CustomersController::class,'index']);
Route::post('/customers', [CustomersController::class,'store']);
Route::get('/customers/{customers}', [CustomersController::class,'show']);
Route::put('/customers/{customers}', [CustomersController::class,'update']);
Route::delete('/customers/{customers}', [CustomersController::class,'destroy']);

    
/*
Route::apiResource('customers',CustomersController::class)->names('api.v1.customers');
*/