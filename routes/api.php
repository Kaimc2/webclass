<?php

use App\Http\Controllers\API\LocationController;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/location/list', [LocationController::class, 'list']);
Route::post('/location/add', [LocationController::class, 'add']);

Route::put('/location/edit/{id}', [LocationController::class, 'edit']);
Route::delete('/location/delete', [LocationController::class, 'delete']);
