<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
<<<<<<< HEAD
        'phonenumber',
        'gender',
        'age',
        'school',
        'address'
    ];
}
=======
        'phonenumber1',
        'phonenumber2',
        'gender',
        'age',
        'school',
        'address'];
}
>>>>>>> c09d9b36e4814b3e39ad1a99d369039efef0e920
