<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_name',
        'image_id',
        'category_id',
        'tag_id',
    ];

    public function image(){
        return $this->hasMany(Image::class,'id','image_id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'album_tag', 'album_id', 'tag_id');
    }
}
