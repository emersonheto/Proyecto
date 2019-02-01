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
//FrontEnds
Route::view('/','index')->name('home');
Route::view('/seguridad','secure')->name('secure');
//Auth
Auth::routes();
//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');
//Files
Route::get('archivos/{type}', 'FilesController@index');
Route::get('archivos/subir', 'FilesController@sowFileFrom');
Route::get('archivos/subir', 'FilesController@store');
Route::get('archivos/editar/{id}', 'FilesController@edit');
Route::get('archivos/eliminar/{id}', 'FilesController@destroy');

