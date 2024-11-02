<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'detail'];

     // Mối quan hệ hasMany với Post
     public function posts()
     {
         return $this->hasMany(Post::class, 'category_post_id');
     }
}
