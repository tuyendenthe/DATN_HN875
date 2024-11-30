<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
 
    use HasFactory;
    const DELETE = 2;
    const UNDELETE = 1;
    protected $table = 'categories_product';

    protected $fillable = [
        'id',
        'created_at','updated_at','name','description','status_delete','idstaff','uuid'
     
    ];
}
