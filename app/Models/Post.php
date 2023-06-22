<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public $appends = ['featured_image_url'];

    public $casts = [
        'published_date' => 'date'
    ];

    /**
     * Returns the user for this post
     */
    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * Returns the category for this post
     */
    public function category() {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function getFeaturedImageUrlAttribute() {

        return  Storage::disk('public')->url('images/'. $this->getAttributes()['featured_image'] );
    }

}
