<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorRatings extends Model
{
    use HasFactory;
    protected $table = 'cust_review_to_tutor';
    protected $primarykey = 'rvw_id';
}
