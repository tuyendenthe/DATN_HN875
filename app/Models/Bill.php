<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = ['bill_code',
'name',
'phone',
'email',
'note',
'checkout',
'payment_method',
'total',

'status',];
}
