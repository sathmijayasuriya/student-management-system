<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Student;
class User extends Authenticatable    
{
    use HasFactory,Notifiable;
    
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'password',
    // ];
    
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

    // set up Eloquent relationship
        public function addedStudents()
    {
        return $this->hasMany(Student::class);
    }
   
}