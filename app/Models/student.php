<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public function students()
{
    return $this->hasMany(student::class, 'class_teacher_id');
}
}
