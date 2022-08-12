<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {
            $category->posts()->delete();
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
