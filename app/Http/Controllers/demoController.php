<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Song;

class demoController extends Controller
{
    //
    public function demo(){
        $songs = Singer::all();
        dd($songs);
    }
}
