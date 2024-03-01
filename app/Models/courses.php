<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;

    protected $fillable=[
        'courseName',
        'courseCode',
        'enrolledStudents',
        'courseStatus',
        'Instructor',
        'discription',
    ];



    public function students()
    {
        return $this->belongsToMany(User::class,'coursesusers');
    }


}
