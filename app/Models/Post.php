<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\like;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'status',
        'user_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function like()
    {
        return $this->hasOne(like::class);
    }
}
