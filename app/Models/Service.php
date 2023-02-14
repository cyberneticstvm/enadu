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
        'localbody',
        'localbody_type',
        'address',
        'status',
        'created_by',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product');
    }

    public function address(){
        return $this->belongsTo(Address::class, 'address');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
