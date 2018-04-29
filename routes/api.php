<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1'],function (){
    Route::get('ping',function (){
        return response()->json('pong');
    });
    Route::group(['namespace' => 'Api\V1\Auth'],function (){
        Route::post('login',['as'=>'v1.login','uses'=>'AuthController@login']);
        Route::post('register',['as'=>'v1.register','uses'=>'AuthController@register']);
    });

    Route::group(['namespace' => 'Api\V1\Auth','middleware' => 'jwt-auth'],function (){
        Route::post('refresh-token', ['as' => 'v1.refresh', 'uses' => 'AuthController@refreshToken']);
    });


});