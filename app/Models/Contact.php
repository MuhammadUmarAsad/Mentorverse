<?php

namespace App\Models;
//namespace App\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    //use HasCompositeKey;

    protected $table = 'user_contactus';
    protected $primaryKey = 'id';
}
