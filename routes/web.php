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

Route::get('/folders', 'HomeController@index')->name('folder.index');
Route::redirect('/home', '/folders');
Route::get('/folder/create', 'HomeController@create')->name('folder.create');
Route::post('/folder/store', 'HomeController@store')->name('folder.store');
Route::get('/folder/{id}', 'HomeController@show')->name('folder.show');
Route::get('/folder/{id}/edit', 'HomeController@edit')->name('folder.edit');
Route::put('/folder/{id}', 'HomeController@update')->name('folder.update');
Route::delete('/folder/{id}', 'HomeController@destroy')->name('folder.destroy');