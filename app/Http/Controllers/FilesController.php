<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\File;

class FilesController extends Controller
{
    private $img_ext=['png','jpg','jpeg','gif','PNG','JPG','JPEG','GIF'];
    private $video_ext=['mp4','avi','jpeg','mpeg','MP4','AVI','JPEG','MPEG'];
    private $documento_ext=['doc','docx','pdf','odt','DOC','DOCX','PDF','ODT'];
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
        return view('admin.files.type.images',\compact('images'));
    } 
    public function  videos()
    {
        return view('admin.files.type.videos');
    } 
    public function  audios()
    {
        return view('admin.files.type.audios');
    }
    public function  documents()
    {
        return view('admin.files.type.documents');
    }

        // validaciones que haremos 
    public function store(Request $request) //RECIBE LOS DATOS DEL FORMILARIO
    {   
        $max_size=(int)ini_get('upload_max_filesize')*1000;   //tamaño maximo que puede tener el archivo
        $all_ext=implode(',',$this->allExtensions());           //unimos todas las extensiones
       
        // Cargamos los datos a las variables 
         $uploadFile=new File();
 
         $file=$request->file('file');
         $name=time().$file->getClientOriginalExtension();
         $ext=$file->getClientOriginalExtension();
         $type=$this->getType($ext);


        $this->validate(request(),
        ['file.*'=>'required|file|mimes:'.$all_ext.'|max:' .$max_size]
        ); 
            // se crea la carpeta y se guarda el archivo con su nombre y extension
        if (Storage::putFileAs('/public/'.$this->getUserFolder().'/'.$type.'/',$file,$name.'.'.$ext))
        {                       //NOMBRE DE CARPETA //TIPO ARCHIVO DEL FORM//FILE= NAME DEL FORM//,NOMBREDOC AGREGANDO SU EXTENSION
            // guardamos el archivo con             
            $uploadFile::create([
                'name'=>$name,
                'type'=>$type,
                'extension'=>$ext,
                'user_id'=>Auth::id()
            ]);
        }
       // return  'Archivo Subido';   
       return back()->with('info',['success','El archivo se ha subido correctamente']);     
    }

    private  function getType($ext)
    {
        if ( in_array($ext,$this->img_ext)) {
            return 'Image';
        }
        if ( in_array($ext,$this->video_ext)) {
            return 'Video';
        }
        if ( in_array($ext,$this->documento_ext)) {
            return 'Audio';
        }
        if ( in_array($ext,$this->audio_ext)) {
            return 'Documento';
        }
    }

    private function allExtensions()
    {
        return array_merge($this->img_ext,$this->video_ext,$this->documento_ext,$this->audio_ext);
    }

    private function getUserFolder()  //retornamos el nombre del usuario para la creacion de la carpeta
    {
        return Auth::user()->name . '-'.Auth::id(); 
    }
}
