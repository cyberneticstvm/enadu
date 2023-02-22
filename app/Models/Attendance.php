<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'signin_time',
        'signout_time',
        'location_in',
        'latitude_in',
        'longitude_in',
        'location_out',
        'latitude_out',
        'longitude_out',
    ];

    public function user(){
        return $this->BelongsTo(User::class, 'user');
    }
}
