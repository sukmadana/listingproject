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

Route::get('/', function () {
    return view('welcome');
});
//API LISTING: 
Route::resource('listings','ListingController');
Route::resource('listing-category', 'ListingCategoryController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');


Route::group(['prefix' => 'admin'], function() {
    //LOGIN ADMINs
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.home');  //home
    Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');

    Route::get('/sales/category','AdminController@showSalesCategory')->name('admin.sales.category');
    Route::get('/sales/category/create','AdminController@showSalesCategory');
    Route::resource('/api/sales-category','SalesCategoryController');
    
});


Route::group(['prefix' => 'merchant'], function () {
    Route::get('/login', 'AuthMerchant\LoginController@showLoginForm')->name('merchant.login');
    Route::post('/login', 'AuthMerchant\LoginController@login')->name('merchant.login.submit');
    Route::get('/', 'MerchantController@index')->name('merchant.home');  //home
    Route::post('/register','AuthMerchant\RegisterController@register')->name('merchant.register');
    Route::get('/register','AuthMerchant\RegisterController@showRegistrationForm');
    Route::get('/logout', 'AuthMerchant\LoginController@logout')->name('merchant.logout');
    Route::get('/password/reset', 'AuthMerchant\ForgotPasswordController@showLinkRequestForm')->name('merchant.password.request');
    Route::post('/password/email', 'AuthMerchant\ForgotPasswordController@sendResetLinkEmail')->name('merchant.password.email');
    Route::get('/password/reset/{token}', 'AuthMerchant\ResetPasswordController@showResetForm')->name('merchant.password.reset');
    Route::post('/password/reset', 'AuthMerchant\ResetPasswordController@reset');
    
});
