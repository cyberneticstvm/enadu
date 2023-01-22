<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'payment_id',
        'payment_request_id',
        'payment_status',
        'amount',
        'discount',
        'payment_type',
    ];

    public function order_details(){
        return $this->hasMany(Order::class, 'order_id');
    }
}
