<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'description',
        'available_for_service',
        'image',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orderdetail(){
        return $this->hasMany(OrderDetail::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }
}
