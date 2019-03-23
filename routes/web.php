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
Route::get('archivos/search', 'FilesController@getData') ->name('file.getData');
Route::post('archivos/subir', 'FilesController@store')   ->name('file.store');
//Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::delete('archivos/eliminar/{id}','FilesController@destroy')->name('file.destroy');
Route::get('files','FilesController@getData')->name('file.gettabla');

Route::get('pruebita','FilesController@prueba')->name('file.prueba');
Route::get('pruebita2',function(){
    //$list=App\Category_file::all();


        $nameCarpeta='C:\laragon\www\Proyecto\storage\app\public\dataaa\\';     
        $dato = new SplFileInfo($nameCarpeta);

        echo "fecha de modificacion => ". date("F d Y H:i:s.", $dato->getMTime()) . "</br>";
        echo "Obtiene el i-nodo de el cambio de tiempo=> ". date("F d Y H:i:s.", $dato->getCTime()) . "</br>";
        echo "Obtiene la hora del último acceso al fichero => ". date("F d Y H:i:s.", $dato->getATime()) . "</br>";
  
        
        echo "Obtiene la ruta sin el nombre de fichero => ". $dato->getPath() . "</br>";
        echo " Obtiene la ruta de un fichero => ". $dato->getPathname() . "</br>";
        echo " obtener el nombre base del archivo=> ". $dato->getBasename() . "</br>";
        echo " verificar que el objeto SplFileInfo sea un archivo o no=> ". $dato->isFile() . "</br>";
        echo " obtener la extensión del archivo=> ". $dato->getExtension() . "</br>";
        echo `<br> `;
        echo "La fecha de modificación del fichero es '" . date ("F d Y H:i:s.", filemtime($nameCarpeta)) . "'";


    // return view ('admin.layouts.app2');
})->name('file.prueba2');

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

//USUARIOS
Route::get('usuarios','Admin\UsersController@index')   ->name('user.index');
Route::get('usuarios/agregar','Admin\UsersController@create')   ->name('user.create');
Route::patch('usuarios/agregar','Admin\UsersController@store')   ->name('user.store');
//para editar usuarios
Route::get('usuarios/{id}/editar','Admin\UsersController@edit')   ->name('user.edit');
Route::get('usuarios/{id}','Admin\UsersController@show')   ->name('user.show');      //para mostrar
Route::patch('usuarios/{id}/editar','Admin\UsersController@update')   ->name('user.update');
//para eliminar usuarios
Route::patch('usuarios/{id}/eliminar','Admin\UsersController@destroy')   ->name('user.destroy');


 //CLIENTES 
 
    Route::get('client/documentos', 'FilesController@documentsClient') ->name('client.documents');
    Route::get('client/files','FilesController@getDataClient')->name('file.getDocumentsClient');



 Route::get('clients/getData','Admin\ClientsController@getData')->name('client.gettabla');
 Route::POST('clients/eliminar/{id}','Admin\ClientsController@PonerInactivo')->name('client.PonerInactivo');
 Route::resource('clients', 'Admin\ClientsController');











