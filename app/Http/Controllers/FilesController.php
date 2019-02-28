<?php

namespace App\Http\Controllers;

use App\File;
use Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreArchivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Validator;
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
    public function  documents(Request $request)
    {   
        // File::Search();
        $roles=Role::all(); 
        if ($request->nameSearch=="") {
            $documents=File::whereUserId(auth()->id())->OrderBy('id','desc')->paginate(10);            
        }else{
            $documents=File::search($request->nameSearch)->whereUserId(auth()->id())->OrderBy('id','desc')->paginate(10);
        }

      //  $docu = File::paginate(15);
        $folder=str_slug(Auth::user()->name . '-'.Auth::id());
        return view('admin.files.type.documents',\compact('documents','folder','roles'));    
    }

    public function  prueba(Request $request)
    {   
        $documents=File::whereUserId(auth()->id())->OrderBy('id','desc')->paginate(10);
        return response()->json($documents);  
    }



    //FIN DE MOSTRAR LOS ARCHIVOS SEGUN EL TIPO DE ARCHIVO

     //PARA ALMACENAR LOS ARCHIVOS
    public function store(StoreArchivo $request) //RECIBE LOS DATOS DEL FORMILARIO
    {   

        try {
                // $validation=Validator::make($request->all(),
                // [
                //     'file'=>'required|image|mimes:'.$all_ext.'|max:4048'
                // ]);    
                $ldate = date('Ymd');
                $file=$request->file('file');
                //$new_name=rand().'.'.$image->getClientOriginalExtension();
                $nombre=$file->getClientOriginalName();
                $new_name=$ldate."_".rand(1,999)."_".$nombre;
                // $new_name=$nombre;
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
                


        } catch (Throwable $th) {
            return response()->json([
                'message'=>$th,
                'uploaded_image'=>'',
                'class_name' =>'alert-danger'
            ]); 
        }



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



        // *****************************************************************
        // if ($request->hasFile('file'))
        // {    
        //     $file_array=$request->file('file');

        //     $conteo=count($file_array);
                      

        //     foreach ($file_array as $file ) 
        //     {
        //         $ldate = date('Ymd');
        //         $nombre=$file->getClientOriginalName();
        //         $ext=$file->getClientOriginalExtension();
        //         $type=$this->getType($ext);
        //         $file_name=$ldate."_".rand(1,999)."_".$nombre;
        //        // $filePath = "/Store/" . date("Y") . '/' . date("m") . "/" . $file_name;
        //         $filePath = "/public/".$this->getUserFolder()."/".$type."/";


        //         // print_r($file_name.":::::pathname : ".$filePath);                
        //         // echo "<br>";                        
                
        //          try 
        //         {
        //             $uploadFile=new File();   
        //             if ( $uploadFile::create([
        //                 'name'=>$file_name,
        //                 'type'=>$type,
        //                 'extension'=>$ext,
        //                 'user_id'=>Auth::id()
        //              ]))
                     
        //             {
        //                 if (Storage::putFileAs($filePath,$file,$file_name))
        //                 {                  //NOMBRE DE CARPETA //TIPO ARCHIVO DEL FORM//FILE= NAME DEL FORM//,NOMBREDOC AGREGANDO SU EXTENSION
        //                    Session::flash('message', 'se subio este archivo'.$file_name); 
                    
        //                 }
        //                 else{
                        
        //                     return back()->withErrors(['SQLerror'=>'No se pudo guardar archivo en carpeta']);
        //                 }
        //             }
                    

        //         }
        //         catch (QueryException $ex) 
        //         {
        //             // return back()->withErrors(['SQLerror'=>'No se pudo ingresar a la base de datos']);
        //             return back()->withErrors(['SQLerror'=>'No se pudo ingresar a la base de datos '.$ex->getMessage()]);
        //         }
              

        //     }
        
        //     return back()->with('info',['success','El archivo se ha subido correctamente']);

        // }    
// *end//////////*********************************************************** */
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
        //$rutaDelArchivo='/public/'.$this->getUserFolder().'/'.$file->type.'/'.$file->name;      
        $rutaDelArchivo='/public/'.$file->name;      
        
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
