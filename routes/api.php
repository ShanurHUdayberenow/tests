<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CategoryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('banners', 'Api\BannerController@index');

Route::get('categories', 'Api\CategoryController@index');

Route::get('saleProducts', 'Api\ProductController@saleProducts');
Route::get('shops', 'Api\ShopController@index');
Route::get('products', 'Api\ProductController@index');
Route::get('attributes', 'Api\AttributeController@index');
