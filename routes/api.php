<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']); //list
Route::post('/products/store', [ProductController::class, 'store']); //create
Route::put('/products/edit/{productId}', [ProductController::class, 'update']); //edit 
Route::delete('/products/delete/{productId}', [ProductController::class, 'destroy']); //delete

Route::get('/location/list', [LocationController::class, 'list']);
Route::post('/location/add', [LocationController::class, 'add']);

Route::put('/location/edit/{id}', [LocationController::class, 'edit']);
Route::delete('/location/delete/{id}', [LocationController::class, 'delete']);
