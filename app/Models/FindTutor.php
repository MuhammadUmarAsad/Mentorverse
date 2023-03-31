<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindTutor extends Model
{
    use HasFactory;
    protected $table = 'tutor';
    protected $primarykey = 'tutorusername';
}
