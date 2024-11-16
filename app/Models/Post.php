<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','content_short','content','category_post_id','image'];

    //Category_post
    public function category()
    {
        return $this->belongsTo(Category_post::class, 'category_post_id');
    }

     //User
     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }
}
