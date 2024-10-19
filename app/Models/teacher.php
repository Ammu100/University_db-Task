<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    public function teacher()
    {
        return $this->belongsTo(teacher::class, 'class_teacher_id');
    }
}
