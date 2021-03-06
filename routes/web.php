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

    /*Item part*/
    /*showing all items*/
    Route::get('item/inventory', ['as' => 'items.inventory', 'uses' => 'ItemController@inventory']);
    //datatables Route
    Route::get('datatable/getitems', [ 'as'=>'datatable.getitems','uses'=>'ItemController@getItems' ]);
    /*creating Items*/
    Route::get('item/create', ['as' => 'items.create', 'uses' => 'ItemController@create']);

    Route::post('/item/store', ['as' => 'items.store', 'uses' => 'ItemController@store']);
    /*Updating Item*/
    Route::get('item/update/{id}', ['as' => 'items.update', 'uses' => 'ItemController@update']);

    Route::post('item/edit/{id}', ['as' => 'items.edit', 'uses' => 'ItemController@edit']);
    //deleting category
    Route::get('/item/delete/{id}','ItemController@destroy');


    /*Category Routes*/
    Route::get('category', ['as' => 'category.index', 'uses' => 'Category\CategoryController@index']);
    /*creating Category*/
    Route::get('category/create', ['as' => 'category.create', 'uses' => 'Category\CategoryController@create']);

    Route::post('category/store', ['as' => 'category.store', 'uses' => 'Category\CategoryController@store']);
    /*Updating Category*/
    Route::get('category/update/{id}', ['as' => 'category.update', 'uses' => 'Category\CategoryController@update']);

    Route::post('category/edit/{id}', ['as' => 'category.edit', 'uses' => 'Category\CategoryController@edit']);
    //deleting category
    Route::delete('category/delete/{id}',['as' => 'category.delete', 'uses' => 'Category\CategoryController@destroy']);

    //Inventory Routes
    /*showing all items*/
    Route::get('/inventory', ['as' => 'inventory.index', 'uses' => 'Inventory\InventoryController@index']);
    //datatables Route
    Route::get('datatable/getinventory/items', [ 'as'=>'datatable.getinventory.items','uses'=>'Inventory\InventoryController@getItems' ]);
    /*creating Items*/
    Route::get('/inventory/create', ['as' => 'inventory.create', 'uses' => 'Inventory\InventoryController@create']);

    Route::post('/inventory/store', ['as' => 'inventory.store', 'uses' => 'Inventory\InventoryController@store']);

    /*Charts Rotes*/
    Route::get('item/chart', ['as' => 'item.chart', 'uses' => 'Chart\ChartItemController@priceChart']);
    /*Area Chart*/
    Route::get('quantity/chart', ['as' => 'quantity.chart', 'uses' => 'Chart\ChartItemController@quantityChart']);
    /*monthly price chart*/
    Route::get('monthly/price', ['as' => 'monthly.price', 'uses' => 'Chart\ChartItemController@monthlyPrice']);
    Route::post('monthly/price', ['as' => 'monthly.price.chart', 'uses' => 'Chart\ChartItemController@monthlyPrice']);
});






/*Item Routes*/
/*showing all items*/
Route::get('item', ['as' => 'items.index', 'uses' => 'ItemController@index']);
//datatables Route
Route::get('datatable/getitems', [ 'as'=>'datatable.getitems','uses'=>'ItemController@getItems' ]);
/*creating Items*/











/*
 * Testing phase only
 * Strictly Prohibited For Productions
 */
Route::get('test/login/{id}', 'Auth\AuthController@loginUsingId')->name('test.login');
