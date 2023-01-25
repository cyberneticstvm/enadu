<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'feedback_category',
        'comment_id',
        'comment',
        'feedback_category',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}