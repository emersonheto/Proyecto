<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('files', function () 
{   
    return datatables()
    ->eloquent(App\File::query())
    ->addColumn('btnMostrar',function($file){            
        $ex=$file->extension;
        $type=$file->type;
        
        $storage=asset('storage');
        
       

        // $storage=asset('storage')/ $file->name;
        if ($type=="image"||$ex=="pdf"||$ex=="PDF")
        {
               return "<a class='btn btn-sm btn-primary  mt-1' style='width: 90px;'
               target='_blank' href=".$storage."/".$file->name."> <i class='fas  fa-eye'></i> Ver</a> ";
        }
        else
        {
            return "<a  class='btn btn-sm btn-primary  mt-1' style='width: 90px;' target='_blank' href=".$storage."/".$file->name.">
               <i class='fas fa-download'></i> Descarga</a>"; 
        }
    })    
    ->addColumn('btnEliminar',function($file){
        
        $RUTA=route('file.destroy',$file->id);
        
        $botoncito= "";
        // if(Auth::user()->hasRole('admin'))
        // {
            $botoncito= "<form action=$RUTA method='DELETE'>
        <button    class='btn btn-danger alertaa  btn-sm mt-1' style='width: 90px;' 
        data-file-id=$file->id  data-file-name=$file->name >
        <i class='fas fa-trash'></i> Delete</button></form> ";
        // }
        return $botoncito;

    })
    ->addColumn('btnNull','<a>Nada</a>')
    ->rawColumns(['btnMostrar','btnEliminar','btnNull'])  
    ->toJson();



});