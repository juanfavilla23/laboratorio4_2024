<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subject_id'];

    // Relación de muchos a uno con Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Relación de uno a muchos con Commission
    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }

    // Relación de muchos a muchos con Student a través de CourseStudent
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students');
    }
}
