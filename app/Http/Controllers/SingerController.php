<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Song;
use App\Models\SongSinger;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Validation\ValidationException;

class SingerController extends Controller
{
    //
    public function create(){
        $songs = Song::with('singers')->get();
        // dd($songs);
        return view('manyToMany.singerCreate',compact('songs'));
    }

    public function store(Request $request){
//    dd($request->all());

        $validation = $request->validate(
            [
                'name' => 'required',
                'role' => 'required',
            ]
        );


        $profile = $request->profile;

        $name = $profile->getClientOriginalName();

        $profile->storeAs('public/images',$name);


       $singer = Singer::create([
        'name' => $validation['name'],
        'role' => $validation['role'],
        'image' => $name,
       ]);


        $singer->songs()->attach($request->song);

        return redirect()->route('singers.index');

    }

    public function index(){

        // dd(\Auth::user());

        $singers = Singer::paginate(5);

        // dd($singers);
        return view('manyToMany.index',compact('singers'));
    }

    public function show(singer $singer){
        // dd($singer->songs);
        return view('manyToMany.show',compact('singer'));
    }

    public function destroy(singer $singer){

       $singer->delete();

       return redirect()->route('singers.index')->with('message','Data delete successfully..');
    }

    public function edit(Singer $singer){

        $singer->with('songs')->first();
        $songs = Song::all();

        return view('manyToMany.edit',compact('singer','songs'));
    }

    public function update(Request $request, singer $singer){

        $profile = $request->profile;
        // dd($profile);

        $name = $profile->getClientOriginalName();

        $profile->storeAs('public/images',$name);

        $singer->update([
            'name' => $request->name    ,
            'image' => $name,
           ]);

        $singer->songs()->sync($request->song);
        // dd($request);

        return redirect()->route('singers.index')->with('success','songs update successfully..');
    }


}
