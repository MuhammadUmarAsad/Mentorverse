<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRatings extends Model
{
    use HasFactory;
    protected $table = 'course_ratings';
    protected $primarykey = 'course_id';
}
