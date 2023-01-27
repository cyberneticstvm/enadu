<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'contact_name',
        'mobile',
        'address',
        'address1',
        'latitude',
        'longitude',
        'pincode',
        'landmark',
        'district',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
