<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Song;
use App\Models\User;
use App\Models\SongSinger;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //
    public function login(){
        return view('manyToMany.login');
    }

    public function store(Request $request){

        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $request->session()->regenerateToken();

            return redirect()->route('singers.index');
        }else{
            return back()->with('message','Please enter valid login details');
        }
    }

    public function create(){   
        return view('manyToMany.register');
    }

    public function authorCreate(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

// dd($validation);

        $authors = User::create($validation);

        return redirect()->route('author.login');
        // dd($request->input());
    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('author.login');
    }
}
