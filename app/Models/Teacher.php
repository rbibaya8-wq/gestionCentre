<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'subject_specialization',
        'phone',
        'salary',
    ];

    

    public function groups()
    {
        return $this->hasMany(Group::class);
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function totalGroups()
    {
        return $this->groups()->count();
    }

    public function yearlySalary()
    {
        return $this->salary * 12;
    }
}