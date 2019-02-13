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
Route::get('archivos/subir', 'FilesController@create')   ->name('file.create');
Route::get('archivos/imagenes', 'FilesController@images')->name('file.images');
Route::get('archivos/videos', 'FilesController@videos')  ->name('file.videos');
Route::get('archivos/audios', 'FilesController@audios')  ->name('file.audios');
Route::get('archivos/documentos', 'FilesController@documents') ->name('file.documents');
Route::post('archivos/subir', 'FilesController@store')   ->name('file.store');
//Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::patch('archivos/eliminar/{id}', 'FilesController@destroy')->name('file.destroy');


//ROLES
Route::get('roles','Admin\RolesController@index')   ->name('role.index');
Route::get('roles/agregar','Admin\RolesController@create')   ->name('role.create');
Route::patch('roles/agregar','Admin\RolesController@store')   ->name('role.store');
//para editar roles
Route::get('roles/{id}/editar','Admin\RolesController@edit')   ->name('role.edit');
Route::get('roles/{id}','Admin\RolesController@show')   ->name('role.show');      //para mostrar
Route::patch('roles/{id}/editar','Admin\RolesController@update')   ->name('role.update');
//para eliminar roles
Route::patch('roles/{id}/eliminar','Admin\RolesController@destroy')   ->name('role.destroy');


//PERMISOS
Route::get('permisos','Admin\PermissionsController@index')   ->name('permission.index');
Route::get('Permisos/agregar','Admin\PermissionsController@create')   ->name('permission.create');
Route::patch('Permisos/agregar','Admin\PermissionsController@store')   ->name('permission.store');
//para editar Permisos
Route::get('Permisos/{id}/editar','Admin\PermissionsController@edit')   ->name('permission.edit');
//Route::get('Permisos/{id}','Admin\PermissionsController@show')   ->name('permission.show');      //para mostrar
Route::patch('Permisos/{id}/editar','Admin\PermissionsController@update')   ->name('permission.update');
//para eliminar Permisos
Route::patch('Permisos/{id}/eliminar','Admin\PermissionsController@destroy')   ->name('permission.destroy');