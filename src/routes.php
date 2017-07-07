<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use VICITECH\ViciCMS\Models\Product;
use VICITECH\ViciCMS\Models\ProductGroup;
use VICITECH\ViciCMS\Models\Provider;
use Illuminate\Support\Facades\Session;

//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//Ajax
Route::get('/information/create/ajax-state',function()
{
    $state_id = Input::get('state_id');
    $subcategories = Provider::where('productgroup_id','=',$state_id)->get();
    return Response::json($subcategories);

});
Route::group(['prefix' => 'admin'], function () {
    // ------------- infor -------------done
//    Route::get('/infor', 'InforController@index');
//    Route::post('/infor/update', 'InforController@update');
    // ------------- Banner -------------done
    Route::get('/banner', 'VICITECH\ViciCMS\SlideController@index');
    Route::get('/banner/insert','VICITECH\ViciCMS\SlideController@create');
    Route::post('/banner/insert', 'VICITECH\ViciCMS\SlideController@store');
    Route::get('/banner/edit/{id}', 'VICITECH\ViciCMS\SlideController@edit');
    Route::post('/banner/update/{id}', 'VICITECH\ViciCMS\SlideController@update');
    Route::get('/banner/destroy/{id}', 'VICITECH\ViciCMS\SlideController@destroy');
    // ------------- Product -------------done
    Route::get('/product', 'VICITECH\ViciCMS\ProductController@index');
    Route::get('/product/insert','VICITECH\ViciCMS\ProductController@create');
    Route::post('/product/create', 'VICITECH\ViciCMS\ProductController@store');
    Route::get('/product/edit/{id}', 'VICITECH\ViciCMS\ProductController@edit');
    Route::post('/product/update/{id}', 'VICITECH\ViciCMS\ProductController@update');
    Route::get('/product/destroy/{id}', 'VICITECH\ViciCMS\ProductController@destroy');
    Route::post('/product/search','VICITECH\ViciCMS\ProductController@search');
    Route::get('/product/tim-kiem/{keys}',['as'=>'timkiemsanpham','uses'=>'VICITECH\ViciCMS\ProductController@timkiem']);

    // ------------- ProductGroup -------------done
    Route::get('/product-group', 'VICITECH\ViciCMS\ProductGroupController@index');
    Route::get('/product-group/insert','VICITECH\ViciCMS\ProductGroupController@create');
    Route::post('/product-group/create', 'VICITECH\ViciCMS\ProductGroupController@store');
    Route::get('/product-group/edit/{id}', 'VICITECH\ViciCMS\ProductGroupController@edit');
    Route::post('/product-group/update/{id}', 'VICITECH\ViciCMS\ProductGroupController@update');
    Route::get('/product-group/destroy/{id}', 'VICITECH\ViciCMS\ProductGroupController@destroy');
    // ------------- manufacturer -------------done
    Route::get('/manufact', 'VICITECH\ViciCMS\ProviderController@index');
    Route::get('/manufact/insert/{id}','VICITECH\ViciCMS\ProviderController@create');
    Route::post('/manufact/create', 'VICITECH\ViciCMS\ProviderController@store');
    Route::get('/manufact/edit/{id}', 'VICITECH\ViciCMS\ProviderController@edit');
    Route::post('/manufact/update/{id}', 'VICITECH\ViciCMS\ProviderController@update');
    Route::get('/manufact/destroy/{id}', 'VICITECH\ViciCMS\ProviderController@destroy');
    // ------------- promotion -------------done
//    Route::get('/promotion', 'VICITECH\ViciCMS\PromotionController@index');
//    Route::get('/promotion/insert','VICITECH\ViciCMS\PromotionController@create');
//    Route::post('/promotion/create', 'VICITECH\ViciCMS\PromotionController@store');
//    Route::get('/promotion/edit/{id}', 'VICITECH\ViciCMS\PromotionController@edit');
//    Route::post('/promotion/update/{id}', 'VICITECH\ViciCMS\PromotionController@update');
//    Route::get('/promotion/destroy/{id}', 'VICITECH\ViciCMS\PromotionController@destroy');
   


});

