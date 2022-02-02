<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name',
        'slug',
    ];
    public function albums()
    {
    return $this->belongsToMany(Tag::class, 'album_tag', 'tag_id', 'album_id');
    }
}
