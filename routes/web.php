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

Route::get('/',['as'=>'home','uses'=>'Dashboard\MainDashboardController@home']);
// Password Reset Routes...
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ResetPasswordController@showLinkRequestForm']);
Route::post('password/reset', ['as' => '', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
// Guest Routes
Route::group(['namespace' => 'Auth','middleware' => ['guest']],function (){
    Route::get('login',['as'=>'login','uses'=>'AuthController@login']);
    Route::post('login',['as'=>'web.do.login','uses'=>'AuthController@doLogin']);
    Route::get('/register',['as'=>'web.register','uses'=>'AuthController@register']);
    Route::post('register',['as'=>'web.do.register','uses'=>'AuthController@doRegister']);


});
// Auth Routes
Route::group(['middleware' => ['auth']],function (){
    Route::get('logout',['as' => 'logout','uses' => 'Auth\AuthController@logout']);
    Route::get('dashboard',['as'=>'dashboard.main','uses'=>'Dashboard\MainDashboardController@dashboard']);
    Route::get('password-reset',['as' => 'profile.password.reset','uses' => 'Auth\AuthController@reset']);
    Route::post('password-reset',['as' => 'password.doReset','uses' => 'Auth\AuthController@doReset']);
    Route::get('profile',['as' => 'profile','uses' => 'User\ProfileController@profile']);
    Route::post('profile',['as' => 'profile.update','uses' => 'User\ProfileController@profileUpdate']);
    Route::get('profile-pic-change',['as' => 'profile.pic.change','uses' => 'User\ProfileController@profilePicChange']);
    Route::post('profile-pic-change',['as' => 'profile.pic.update','uses' => 'User\ProfileController@doProfilePicChange']);
    // laravel logs viewer
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

});


/*Category Routes*/
Route::get('/category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
//deleting category
Route::get('/category/delete/{id}','CategoryController@destroy');



/*Item Routes*/
/*showing all items*/
Route::get('/item', ['as' => 'items.index', 'uses' => 'ItemController@index']);
/*creating Items*/
Route::get('/item/create', ['as' => 'items.create', 'uses' => 'ItemController@create']);

Route::post('/item/store', ['as' => 'items.store', 'uses' => 'ItemController@store']);
//deleting category
Route::get('/item/delete/{id}','ItemController@destroy');
/*Updating Item*/
Route::get('/item/update/{id}', ['as' => 'items.update', 'uses' => 'ItemController@update']);

Route::post('/item/edit/{id}', ['as' => 'items.edit', 'uses' => 'ItemController@edit']);








/*
 * Testing phase only
 * Strictly Prohibited For Productions
 */
Route::get('test/login/{id}', 'Auth\AuthController@loginUsingId')->name('test.login');
