<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course',
        'age',
        'user_id',
    ];

    //Set Up Eloquent Relationship
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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