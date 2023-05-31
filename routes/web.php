<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\authController;
use App\Http\Controllers\demoController;


//Here is all routes

// This comment is for checking the git hub account..

Route::get('/', function (){
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('songs/create',[SongController::class,'create'])->name('songs.create');

Route::post('songs',[SongController::class,'store'])->name('songs.store');


//For Singers..

Route::get('singers',[SingerController::class,'index'])->name('singers.index')->middleware('roleCheck');

Route::get('singers/create',[SingerController::class,'create'])->name('singers.create');

Route::post('singers',[SingerController::class,'store'])->name('singer.store');

Route::get('singers/{singer}',[SingerController::class,'show'])->name('singers.show');

Route::delete('singers/{singer}',[SingerController::class,'destroy'])->name('singers.destroy');

Route::get('singers/edit/{singer}',[SingerController::class,'edit'])->name('singers.edit');

Route::put('singers/{singer}',[SingerController::class,'update'])->name('singers.update');

// For demo Controller..

Route::get('demo',[demoController::class,'demo'])->name('demo.demo');

// Route::view('noaccess','manyToMany.noaccess');


// Authentication sections

Route::get('author',[authController::class,'login'])->name('author.login');

Route::post('author',[authController::class,'store'])->name('author.store');



// Registration Forms routes

Route::get('author/register',[authController::class,'create'])->name('author.create');

Route::post('author/store',[authController::class,'authorCreate'])->name('author.register');

Route::view('noaccess', 'manyToMany.noaccess')->name('noaccess');

Route::delete('author',[authController::class,'destroy'])->name('author.destroy');


