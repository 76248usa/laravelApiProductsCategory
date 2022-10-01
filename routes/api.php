<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/products', 'ProductController@index');

Route::get('/products/{product}','ProductController@show');

Route::post('/products','ProductController@store');

Route::put('/products/{product}','ProductController@update');
Route::delete('/products/{product}','ProductController@destroy');*/
//Route::get('/categories', 'CategoryController');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::apiResource('products', 'ProductController');

Route::apiResource('/products', 'ProductController');

Route::get('/categories', 'CategoryController');
