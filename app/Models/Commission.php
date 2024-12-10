<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = ['aula', 'horario', 'course_id', 'professor_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students');
    }
}
