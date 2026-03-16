<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'publisher_id',
        'name_en',
        'name_bn',
        'sku',
        'stock',
        'slug',
        'excerpt_en',
        'excerpt_bn',
        'description_en',
        'description_bn',
        'featured_image',
        'price',
        'discount',
        'discount_price',
        'final_price',
        'unit',
        'tags',
        'active',
        'editor',
        'addedby_id',
        'editedby_id',
        'file_path',
        'preview_path',
    ];


    public function fi()
    {
        return $this->featured_image ?: 'not_found.png';
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'addedby_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_cats', 'product_id', 'product_category_id');
    }



    public function cart()
    {
        return $this->hasOne(Cart::class);
    }


    public function items()
    {
       return $this->hasMany(OrderItem::class, 'product_id');
    }


    
    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }

    // Get average rating
    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }



    // favorite logic 
    public function userBooks()
    {
        return $this->hasMany(UserBook::class, 'product_id');
    }

    public function isFavoritedBy($user)
    {
        if (!$user) return false;
        return $this->userBooks()
                    ->where('user_id', $user->id)
                    ->where('status', 'favorite')
                    ->exists();
    }

 
    // ===== Author & Publisher Relations =====
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id'); // product belongs to an author
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id'); // product belongs to a publisher
    }
   
}