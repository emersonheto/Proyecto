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
        $storage=public_path('storage');
        if ($type=="image"||$ex=="pdf"||$ex=="PDF")
        { 
               return "<button class='btn btn-sm btn-primary  mt-1' style='width: 90px;'
               target='_blank' href='$storage $file->name'>
               <i class='fas  fa-eye'></i> Ver</button> ";
        }
        else
        {
            return "<button  class='btn btn-sm btn-primary  mt-1' style='width: 90px;' target='_blank' href='$storage$file->name'>
               <i class='fas fa-download'></i> Descarga</button>"; 
        }
    })
    ->addColumn('btnEliminar',function($file){
        $storage=asset('storage');        
        return  "<button type='submit' class='btn btn-danger  btn-sm mt-1' style='width: 90px;' data-toggle='modal' data-target='#deleteModal'
        data-file-id=$file->id> <i class='fas fa-trash'></i> Delete</button>";        
    })
    ->rawColumns(['btnMostrar','btnEliminar'])  
    ->toJson();
});