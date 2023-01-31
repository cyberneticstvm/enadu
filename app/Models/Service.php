<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'ptype',
        'ptype_address',
        'district',
        'corporation',
        'municipality',
        'grama_panchayat',
        'address',
        'status',
        'created_by',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product');
    }
}
