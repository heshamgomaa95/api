<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::group(['middleware'=>['api','checkPassword','changeLanguage'],'namespace'=>'Api'],function (){
   Route::post('get_main_categories','CategoriesController@index');
   Route::post('get_categorie_byId','CategoriesController@getCategoryById');
   Route::post('change_categroy_status','CategoriesController@changeStatus');

   Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
       Route::post('login', 'AuthController@login');

   });

});

Route::group(['middleware'=>['api','checkPassword','changeLanguage','checkadmintoken:admin-api'],'namespace'=>'Api'],function () {

    Route::get('offers', 'CategoriesController@index');
});
