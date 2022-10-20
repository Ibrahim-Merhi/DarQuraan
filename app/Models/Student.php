<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //fillable
    protected $fillable = [
        'name',
        'email',
        'password',
        'm_name',
        'user_id',
        'last_name',
        'phone',
        'address',
        'city',
        'state',
        'active',
        'sex',


    ];

    //student teacher
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
