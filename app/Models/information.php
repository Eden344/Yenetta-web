<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_first_name',
        'parent_last_name',
        'parent_email',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'phonenumber1',
        'phonenumber2',
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
