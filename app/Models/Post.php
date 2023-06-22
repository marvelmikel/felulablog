<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;


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

        'link',
        'author',
        'source',
        'is_rss',

        'category_id',
        'featured_image', 
        'published_date',
        'is_published',
        'post_id',
        'name', 
        'email', 
        'comment'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

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

        if($this->is_rss){
            return  $this->featured_image;
        }else{
            return  Storage::disk('public')->url('images/'. $this->getAttributes()['featured_image'] );
        }
    }
       

}
