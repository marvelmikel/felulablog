<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Columns that are mass assignable
     */
    protected $fillable = [
        'user_id', 
        'title', 
        'excerpt', 
        'body', 
        'category_id',
        'featured_image', 
        'published_date',
        'is_published'
    ];

    /**
     * Returns the user for this post
     */
    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

}
