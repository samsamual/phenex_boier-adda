<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function fi()
    {
        return $this->featured_image ?: 'fi.jpg';
    }

    public function images()
    {
        return $this->hasMany(GalleryItem::class,'gallery_id');
    }
}
