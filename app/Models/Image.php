<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_name',
        'album_id',
    ];

    public function album(){
        return $this->hasMany(Image::class,'id','album_id');
    }

}
