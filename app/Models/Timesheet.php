<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    //fillable
    protected $fillable = [
        'day_name',
        'time_day',
        'student_id'
    ];
    use HasFactory;
}
