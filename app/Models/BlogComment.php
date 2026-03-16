<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'parent_id', 'user_id', 'name', 'email', 'comment', 'active'
    ];

    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'post_id');
    }

    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id')->where('active', 1);
    }
}
