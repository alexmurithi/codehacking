<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    public function index(){
        $photos =Photo::all();
        return view('admin.medias.index',compact('photos'));
    }
}
