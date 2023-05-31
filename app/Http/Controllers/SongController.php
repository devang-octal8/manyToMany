<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Song;
use App\Models\SongSinger;

class SongController extends Controller
{
    //
    public function create(){

        $singers = Singer::with('songs')->get();
        // dd($singers);
        return view('manyToMany.create',compact('singers'));
    }

    public function store(Request $request){

    //   dd($request);
    
    $validation = $request->validate([
        'title' => 'required',
    ]);

      $singer = Song::create($request->only('title'));

      $singer->singers()->attach($request->singer);

    //   dd($singer);

        return redirect()->route('singers.index');
    }
}
