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
        'phonenumber',
        'gender',
        'age',
        'school',
        'address',
        'fee',
        'schedule_id',
    ];
      
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

     
    protected $table = 'information';
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
}
