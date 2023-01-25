<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'order_status',
    ];
}
