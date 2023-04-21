<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;



Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix'=>'categories'], function(){

    Route::resource('categories', CategoryController::class);

});

Route::group(['prefix'=>'tags'], function(){
 
    Route::resource('tags', TagController::class);

});

Route::group(['prefix'=>'colors'], function(){

    Route::resource('colors', ColorController::class);

});


Route::group(['prefix'=>'users'], function(){

    Route::resource('users', UserController::class);

});

Route::group(['prefix'=>'products'], function(){

    Route::resource('products', ProductController::class);

});




