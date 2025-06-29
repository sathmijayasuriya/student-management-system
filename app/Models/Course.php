<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'duration',
        'credits',
        'code',
    ];

    // public function students()
    // {
    //     return $this->belongsToMany('App\Models\User', 'course_user');
    // }
}