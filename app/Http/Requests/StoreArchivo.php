<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArchivo extends FormRequest
{

    private $img_ext=['png','jpg','jpeg','gif','PNG','JPG','JPEG','GIF'];
    private $video_ext=['mp4','avi','jpeg','mpeg','MP4','AVI','JPEG','MPEG'];
    private $documento_ext=['doc','docx','pdf','odt','DOC','DOCX','PDF','ODT','xlsx','XLSX'];
    private $audio_ext=['mp3','mpga','wma','ogg','MP3','MPGA','WMA','OGG'];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $max_size=(int)ini_get('upload_max_filesize')*10000000;
        $all_ext=implode(',',$this->allExtensions());  
        return [
            'file.*'=>'required|file|mimes:'.$all_ext.'|max:'.$max_size
        ];
    }


    private function allExtensions()
    {
        return array_merge($this->img_ext,$this->video_ext,$this->documento_ext,$this->audio_ext);
    }
}
