<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'time_in', 'time_out'
    ];

    public function students()
    {
        return $this->hasMany(Information::class, 'schedule_id');
    }

    protected $table = 'schedules';

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'schedule_id');
    }
    
}
