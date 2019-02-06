<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.files.create');
    }

    
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
    public function  documents()
    {
        $documents=File::whereUserId(auth()->id())->OrderBy('id','desc')->Where('type','=','document')->get();
        $folder=str_slug(Auth::user()->name . '-'.Auth::id());
        return view('admin.files.type.documents',\compact('documents','folder'));    
    }

        // validaciones que haremos 
    public function store(Request $request) //RECIBE LOS DATOS DEL FORMILARIO
    {   
        $max_size=(int)ini_get('upload_max_filesize')*1000;   //tamaño maximo que puede tener el archivo
        $all_ext=implode(',',$this->allExtensions());           //unimos todas las extensiones
        
        $this->validate(request(),[
            'file.*'=>'required|file|mimes:' .$all_ext. '|max:' .$max_size
        ]); 
        
        // Cargamos los datos a las variables 
         $uploadFile=new File();

         $file=$request->file('file');
         
         
         $name=$file->getClientOriginalName();
         //$name=time().$file->getClientOriginalExtension();
         $ext=$file->getClientOriginalExtension();
         $type=$this->getType($ext);
        
        try {
                $uploadFile::create([
                    'name'=>$name,
                    'type'=>$type,
                    'extension'=>$ext,
                    'user_id'=>Auth::id()]);
          
        } catch (QueryException $ex) {
           // return back()->withErrors(['SQLerror'=>'No se pudo ingresar a la base de datos']);
          
            return back()->withErrors(['SQLerror'=>'No se pudo ingresar a la base de datos '.$ex->getMessage()]);
        }    

        // se crea la carpeta y se guarda el archivo con su nombre y extension
        if (Storage::putFileAs('/public/'.$this->getUserFolder().'/'.$type.'/',$file,$name.'.'.$ext))
        {                       //NOMBRE DE CARPETA //TIPO ARCHIVO DEL FORM//FILE= NAME DEL FORM//,NOMBREDOC AGREGANDO SU EXTENSION
            return back()->with('info',['success','El archivo se ha subido correctamente']);     
        }else{
            return back()->withErrors(['SQLerror'=>'No se pudo guardar archivo en carpeta']);
        }
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
