<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreArchivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\File;

class FilesController extends Controller
{
    private $img_ext=['png','jpg','jpeg','gif','PNG','JPG','JPEG','GIF'];
    private $video_ext=['mp4','avi','jpeg','mpeg','MP4','AVI','JPEG','MPEG'];
    private $documento_ext=['doc','docx','pdf','odt','DOC','DOCX','PDF','ODT','xlsx','XLSX'];
    private $audio_ext=['mp3','mpga','wma','ogg','MP3','MPGA','WMA','OGG'];

    public function __construct()
    {
        $this->middleware('auth');       
    }  
    public function  create()
    {
        $roles=Role::all(); 
        return view('admin.files.create',\compact('roles'));
    }
    //PARA MOSTRAR LOS ARCHIVOS SEGUN EL TIPO DE ARCHIVO
    public function  images()
    {           
        $images=File::whereUserId(auth()->id())->OrderBy('id','desc')->Where('type','=','image')->get();
        $folder=str_slug(Auth::user()->name . '-'.Auth::id());
        return view('admin.files.type.images',\compact('images','folder'));
    } 
    public function  videos()
    {
        $videos=File::whereUserId(auth()->id())->OrderBy('id','desc')->Where('type','=','video')->get();
        $folder=str_slug(Auth::user()->name . '-'.Auth::id());
        return view('admin.files.type.videos',\compact('videos','folder'));    
    } 
    public function  audios()
    {
        $audios=File::whereUserId(auth()->id())->OrderBy('id','desc')->Where('type','=','audio')->get();
        $folder=str_slug(Auth::user()->name . '-'.Auth::id());
        return view('admin.files.type.audios',\compact('audios','folder'));    
    }
    // public function  documents()
    // { 
    //     $documents=File::whereUserId(auth()->id())->OrderBy('id','desc')->paginate(10);
    //     $folder=str_slug(Auth::user()->name . '-'.Auth::id());
    //     $roles=Role::all();  
    //     return view('admin.files.type.documents',\compact('documents','folder','roles'));
        
    // }
    public function  documents()
    {         
        return view('admin.files.type.documents');       
    }

    public function getData()
    {
        $files=File::all();

        return DataTables::of($files)
        ->addColumn('btnMostrar',function($file){
            
            $ex=$file->extension;
            $type=$file->type;
            $storage=asset('storage');
            if ($type=="image"||$ex=="pdf"||$ex=="PDF")
            { 
                   return "<button class='btn btn-sm btn-primary  mt-1' style='width: 90px;' target='_blank' href='.$storage/$file->name.'>
                   <i class='fas  fa-eye'></i> Ver</button> ";
            }
            else
            {
                return "<button  class='btn btn-sm btn-primary  mt-1' style='width: 90px;' target='_blank' href='$storage/$file->name'>
                   <i class='fas fa-download'></i> Descarga</button>"; 
            }
        })
        ->addColumn('btnEliminar',function($file){           
            
            $storage=asset('storage');
            
            return  "<button type='submit' class='btn btn-danger  btn-sm mt-1' style='width: 90px;' data-toggle='modal' data-target='#deleteModal'
            data-file-id=$file->id> <i class='fas fa-trash'></i> Delete</button>";
            
        })
        ->rawColumns(['btnMostrar','btnEliminar'])   
        ->make(true);
    }

    //FIN DE MOSTRAR LOS ARCHIVOS SEGUN EL TIPO DE ARCHIVO

     //PARA ALMACENAR LOS ARCHIVOS
    public function store(Request $request) //RECIBE LOS DATOS DEL FORMILARIO
    {   
        try {
            $ldate = date('Ymd');
            $file=$request->file('file');
            $nombre=$file->getClientOriginalName();
            $new_name=$ldate."_".rand(1,999)."_".$nombre;

            // return response()->json($nombre);
    
            $ext=$file->getClientOriginalExtension();
            $type=$this->getType($ext);
            $filePath = "/public/".$this->getUserFolder()."/".$type."/";
                
            $uploadFile=new File();   
            if ( $uploadFile::create(['name'=>$new_name,'type'=>$type,
                                'extension'=>$ext,'user_id'=>Auth::id()
                ]))        //verificamos si se registro a la base de datos
            {
                $file->move(public_path('storage'),$new_name);
                        
                return response()->json([
                'message'=>'Imagen '.$new_name.' cargada correctamente'. public_path('storage') ,
                'uploaded_image'=>'<img class="mt-4" style="width:20%" src="'.asset('storage').'/'.$new_name.'"/>',
                'class_name' =>'alert-success'
                ]); 
            }
            else
            {
                return response()->json([
                    'message'=>'Error al ingresar el archivo a la base de datos',
                    'uploaded_image'=>'',
                    'class_name' =>'alert-danger'
                ]); 
            }
        } catch (\Exception $err) {
            return response()->json("Error al subir archivo.", 401); 
        }
  
     
    }
  
    public function destroy($id)
    { 
        $file=File::findOrFail($id);//agregamos la variable del modal
       
        // $rutaDelArchivo='/public/'.$file->name;      
        
        // if (Storage::disk('local')->exists($rutaDelArchivo)) 
        // {
        //    if (Storage::disk('local')->delete($rutaDelArchivo))
        //    {
                $file->delete();
        //         // return back();
        //         return redirect('file.documents')->with('info',['success','El archivo se eliminó correctamente']);
        //    }
        // }

        return response()->json([
            'message' => 'Articulo Eliminado'
          ]); 
    }

    private  function getType($ext)
    {
        if ( in_array($ext,$this->img_ext)) {
            return 'image';
        }
        if ( in_array($ext,$this->video_ext)) {
            return 'video';
        }
        if ( in_array($ext,$this->documento_ext)) {
            return 'document';
        }
        if ( in_array($ext,$this->audio_ext)) {
            return 'audio';
        }        
    }

    private function allExtensions()
    {
        return array_merge($this->img_ext,$this->video_ext,$this->documento_ext,$this->audio_ext);
    }

    private function getUserFolder()  //retornamos el nombre del usuario para la creacion de la carpeta
    {
        $folder=Auth::user()->name . '-'.Auth::id(); 
        return str_slug($folder);
    }
}
