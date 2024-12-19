<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable= [
        'voucher_code',
        'quantity',
        'price_sale',
        'start_date',
        'end_date',
        'condition',
        
    ];
    public function getExperyDateAttributes(){
        return Carbon::parse($this->attributes['expery_date'])->format('Y-m-d');
    }
    public function users(){
        return $this->belongsToMany(User::class,'coupon_users');
    }
    public function firstwithExperyDate($name, $userID){

    }
}
