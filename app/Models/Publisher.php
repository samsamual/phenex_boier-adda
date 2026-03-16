<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    public function fi()
    {
        return $this->image ? : 'fi.jpg';
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'publisher_id');
    }

}
