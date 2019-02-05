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
//Route::get('archivos', 'FilesController@index');
Route::get('archivos/subir', 'FilesController@create')->name('file.create');


Route::get('archivos/imagenes', 'FilesController@images')->name('file.images');
Route::get('archivos/videos', 'FilesController@videos')->name('file.videos');
Route::get('archivos/audios', 'FilesController@audios')->name('file.audios');
Route::get('archivos/documentos', 'FilesController@documents')->name('file.documents');


Route::post('archivos/subir', 'FilesController@store')->name('file.store');
Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::post('archivos/eliminar/{id}', 'FilesController@destroy');

