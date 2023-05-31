<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];


public function singers(){
    return $this->belongsToMany(Singer::class,'song_singers','song_id','singer_id');
}

}
