<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tag;
use App\Comment;
use App\User;
use App\Category;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'post_image',
        'user_id',
        'category_id',
        'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if(is_null($post->user_id)) {
                $post->user_id = auth()->user()->id;
            }
        });

        static::deleting(function ($post) {
            $post->comments()->delete();
            $post->tags()->detach();
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }

    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }

    public function getEtagAttribute()
    {
        return hash('sha256', "product-{$this->id}-{$this->updated_at}");
    }
}
