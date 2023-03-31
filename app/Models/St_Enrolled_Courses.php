<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class St_Enrolled_Courses extends Model
{
    use HasFactory;
    protected $table = 'student_enrolled_in_course';
    protected $primarykey = 'enrolledID';
}
