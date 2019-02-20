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
    public function  documents()
    {
        $documents=File::whereUserId(auth()->id())->OrderBy('id','desc')->Where('type','=','document')->paginate(5);
      //  $docu = File::paginate(15);
        $folder=str_slug(Auth::user()->name . '-'.Auth::id());
        return view('admin.files.type.documents',\compact('documents','folder'));    
    }
    //FIN DE MOSTRAR LOS ARCHIVOS SEGUN EL TIPO DE ARCHIVO


     //PARA ALMACENAR LOS ARCHIVOS
    public function store(Request $request) //RECIBE LOS DATOS DEL FORMILARIO
    {   
        $max_size=(int)ini_get('upload_max_filesize')*1000;   //tamaño maximo que puede tener el archivo
        $all_ext=implode(',',$this->allExtensions());           //unimos todas las extensiones
        
        //VALIDAMOS LOS ARCHIVOS CON VALIDATE
        // $this->validate(request(),[
        //     'file.*'=>'required|file|mimes:' .$all_ext. '|max:' .$max_size
        // ]);        
        // CARGAMOS LAS VARIABLES 
        // $this->validate(request(),[
        //     'file' => 'required',
        //     'file.*'=> 'mimes:'.$all_ext,  
        //     'file' => 'max:'.$max_size            
        // //'file.*'=>'required|file|mimes:' .$all_ext. '|max:' .$max_size
        // ]);
        if ($request->hasFile('file'))
        {
            $file_array=$request->file('file');

            $conteo=count($file_array);
                      

            foreach ($file_array as $file ) 
            {
                $ldate = date('Y-m-d');
                $nombre=$file->getClientOriginalName();
                $ext=$file->getClientOriginalExtension();
                $image_name=$ldate."".$nombre.rand(1, 999);
                $filePath = "/Store/" . date("Y") . '/' . date("m") . "/" . $image_name;
                print_r($image_name."filename : ".$filePath);
                echo "<br>";

                 if (Storage::putFileAs('/public/'.$this->getUserFolder().'/'.$type.'/',$file,$name.'.'.$ext))
                {                      //NOMBRE DE CARPETA //TIPO ARCHIVO DEL FORM//FILE= NAME DEL FORM//,NOMBREDOC AGREGANDO SU EXTENSION
                    return back()->with('info',['success','El archivo se ha subido correctamente']);     
                }else{
                    return back()->withErrors(['SQLerror'=>'No se pudo guardar archivo en carpeta']);
                }



            }
        }    





        // $files=[];    

        // $validator = Validator::make(
        //     $input_data, [
        //     'image_file.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
        //     ],[
        //         'image_file.*.required' => 'Please upload an image',
        //         'image_file.*.mimes' => 'Only jpeg,png and bmp images are allowed',
        //         'image_file.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
        //     ]
        // );

        // if ($validator->fails()) {
        //     // Validation error.. 
        // }
        //$files=$request->file('file');
        
        // foreach ($request->file('file') as $file) {
          
        //         $name=$file->getClientOriginalName();
        //         //$name=time().$file->getClientOriginalExtension();
        //         $ext=$file->getClientOriginalExtension();
        //         $type=$this->getType($ext);

        //         $uploadFile=new File();

        //         print_r("<br>");
        //         print_r($name." ".$ext." ".$type);

        // }

        // $input_data = $request->all();




        
            // try {
            //         $uploadFile::create([
            //             'name'=>$name,
            //             'type'=>$type,
            //             'extension'=>$ext,
            //             'user_id'=>Auth::id()
            //         ]);
            
            // } catch (QueryException $ex) {
            // // return back()->withErrors(['SQLerror'=>'No se pudo ingresar a la base de datos']);
            //     return back()->withErrors(['SQLerror'=>'No se pudo ingresar a la base de datos '.$ex->getMessage()]);
            // }
            // // se crea la carpeta y se guarda el archivo con su nombre y extension 
            // if (Storage::putFileAs('/public/'.$this->getUserFolder().'/'.$type.'/',$file,$name.'.'.$ext))
            // {                      //NOMBRE DE CARPETA //TIPO ARCHIVO DEL FORM//FILE= NAME DEL FORM//,NOMBREDOC AGREGANDO SU EXTENSION
            //     return back()->with('info',['success','El archivo se ha subido correctamente']);     
            // }else{
            //     return back()->withErrors(['SQLerror'=>'No se pudo guardar archivo en carpeta']);
            // }
    }
  
    public function destroy(Request $request)
    { 
        $file=File::findOrFail($request->file_id);//agregamos la variable del modal
       // dd($file);
        //$file=File::findOrFail($request->get('file_id'));     // son lo mismo
        $rutaDelArchivo='/public/'.$this->getUserFolder().'/'.$file->type.'/'.$file->name.'.'.$file->extension;      
        
        if (Storage::disk('local')->exists($rutaDelArchivo)) 
        {
           if (Storage::disk('local')->delete($rutaDelArchivo))
           {
                $file->delete();
                return back()->with('info',['success','El archivo se eliminó correctamente']);
           }
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
