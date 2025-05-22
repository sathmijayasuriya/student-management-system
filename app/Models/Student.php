<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'course',
        'age',
    ];

    protected $casts = [   
        'age' => 'integer',
    ];

    public function scopeSearch($query, $search)
    //reusable query scope

    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('course', 'like', "%{$search}%");
    }
}
