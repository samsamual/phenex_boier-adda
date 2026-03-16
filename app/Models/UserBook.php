<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Your schema lists "user book table", but table names with spaces are unconventional.
     * We are assuming the actual table name is 'user_book' or 'user_books'.
     * If the table name is different, please update the value below.
     */
    protected $table = 'user_books';

    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'last_read_at',
    ];

    protected $casts = [
        'last_read_at' => 'datetime',
    ];

    /**
     * Get the user that owns the book record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product associated with the record.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
