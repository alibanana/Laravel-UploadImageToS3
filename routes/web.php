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

Route::get('/', function () { return view('welcome'); });

Auth::routes(['verify' => true]);

Route::get('/folders', 'HomeController@index')->name('folders');
Route::redirect('/home', '/folders');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/store', 'HomeController@store')->name('store');
Route::get('/folder/{id}', 'HomeController@show')->name('show');
Route::get('/edit', 'HomeController@edit')->name('edit');