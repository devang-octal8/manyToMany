<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'image',
    ];

    public function songs(){
        return $this->belongsToMany(Song::class,'song_singers','singer_id','song_id');
    }

    public function setNameAttribute($value){
        return $this->attributes['name']= "Singer. ".$value;
    }

    // public function singers(){
    //     return $this->belongsToMany(Singer::class,'song_singers','song_id','singer_id');
    // }
}
