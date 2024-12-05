<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AController;
use App\Http\Controllers\BController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes pour la gestion des catégories
Route::get('categories', [AController::class, 'index']);
Route::post('categories', [AController::class, 'store']);

// Routes pour la gestion des produits
Route::get('products', [BController::class, 'index']);
Route::post('products', [BController::class, 'store']); 
