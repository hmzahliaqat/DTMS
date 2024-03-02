<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coursesuser extends Model
{
    use HasFactory;

    protected $fillable=[
        'courses_id',
        'user_id',
    ];
}
