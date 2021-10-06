<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class like extends Model
{
    use HasFactory;

    protected $fillable = [
        'likes',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
