<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/editmail', 'EditmailController@index')->name('editmail');
Route::POST('/editmail', 'EditmailController@updatemail')->name('editmail');
Route::get('/mail', 'HomeController@mail');
Route::get('/edit-profile', 'UserController@show')->name('users.edit');;
Route::patch('/edit-profile', 'UserController@edit');
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar');
