<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'img',
        'bio',
        'addedby_id',
        'active',
    ];

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'addedby_id');
    }

    public function ai()
    {
        return $this->img ? 'author_img/' . $this->img : 'fi.jpg';
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'author_id');
    }
}
