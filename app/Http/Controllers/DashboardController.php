<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Commission;
use App\Models\Professor;
use App\Models\CourseStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $subjectsCount = Subject::count();
        $coursesCount = Course::count();
        $commissionsCount = Commission::count();
        $professorsCount = Professor::count();
        $courseStudentsCount = CourseStudent::count();

        return view('dashboard', compact('studentsCount', 'subjectsCount', 'coursesCount', 'commissionsCount', 'professorsCount', 'courseStudentsCount'));
    }
}

