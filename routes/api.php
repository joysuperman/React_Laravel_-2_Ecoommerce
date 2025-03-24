<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\TempImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\categoryController;
use \App\Http\Controllers\admin\brandControllerler;
use \App\Http\Controllers\admin\SizeController;
use \App\Http\Controllers\admin\ProductController;

Route::post('/admin/login', [AuthController::class,'authenticate']);

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::group(['middleware' => 'auth:sanctum'], function() {
//    Route::get('categories', [categoryController::class,'index']);
//    Route::get('categories/{id}', [categoryController::class,'show']);
//    Route::put('categories/{id}', [categoryController::class,'update']);
//    Route::delete('categories/{id}', [categoryController::class,'destroy']);
//    Route::post('categories', [categoryController::class,'store']);
//    Route::resource('sizes', SizeController::class);

    Route::resource('categories', categoryController::class);
    Route::resource('brands', brandControllerler::class);
    Route::get('sizes', [SizeController::class,'index']);
    Route::resource('products', ProductController::class);
    Route::post('temp-images', [TempImageController::class,'store']);
});
