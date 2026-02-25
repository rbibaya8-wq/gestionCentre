<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'level', 'phone', 'parent_name', 'parent_phone','group_id','enrollment_date'];

 public function group()
{
    return $this->belongsTo(Group::class);
}

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
