<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function  create(){
        return view('admin.files.create');
    }
}
