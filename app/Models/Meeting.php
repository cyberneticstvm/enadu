<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'mobile',
        'customer_address',
        'location',
        'latitude',
        'longitude',
        'distance',
        'created_by',
    ];
}
