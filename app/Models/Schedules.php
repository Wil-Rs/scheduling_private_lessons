<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time_schedule',
        'teacher_id',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }
}
