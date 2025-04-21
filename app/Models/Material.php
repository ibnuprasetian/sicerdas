<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
