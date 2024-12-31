<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id',
    'bill_id',
    'bill_code',
    'quantity',
    'product_name',
    'subtotal','price'
];
    }


