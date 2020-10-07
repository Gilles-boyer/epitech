<?php

use App\Http\Controllers\ProductController;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'ProductController@show')->name('show');
Route::post('search', 'HomeController@search')->name('search.post');
route::get('search/cat/{id}','HomeController@filtercat')->name('search.cat.id');
route::get('search/location/{id}','HomeController@filterloc')->name('search.loc.id');

Route::middleware('auth')->group(function () {

Route::get('category', 'CategoryController@create')->name('category');
Route::post('category', 'CategoryController@store')->name('create.category.post');

Route::get('location', 'LocationController@create')->name('location');
Route::post('location', 'LocationController@store')->name('location.post');

Route::view('userSetting', 'userSetting')->name('userSetting');
Route::post('userSetting', 'UpdateUser@update')->name('userSetting.post');

Route::get('ads', 'ProductController@index')->name('ads');
Route::post('ads', 'ProductController@store')->name('ads.post');

Route::get('userads', 'ProductController@userads')->name('userads');
Route::post('userads', 'ProductController@deleteOrUpdate')->name('userads.post');

Route::get('/modifyads/{id}', 'ProductController@edit')->name('modifyads');
Route::post('modifyads', 'ProductController@update')->name('modify.post');
});

