<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_code',
        'name',
        'phone',
        'email',
        'note',
        'checkout',
        'payment_method',
        'total',

        'status',
    ];

    // public function status()
    // {
    //     return $this->belongsTo(Status::class);
    // }
    public function Bill_detail(){
        return $this->hasMany(Bill_detail::class,'bill_id');
    }
}
