<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $courseId = $request->input('course_id');
        $commissionId = $request->input('commission_id');

        $courseStudents = CourseStudent::with(['student', 'course', 'commission'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('student', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })->when($courseId, function ($query, $courseId) {
                return $query->where('course_id', $courseId);
            })->when($commissionId, function ($query, $commissionId) {
                return $query->where('commission_id', $commissionId);
            })->paginate(10);

        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_students.index', compact('courseStudents', 'search', 'courses', 'commissions', 'courseId', 'commissionId'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();
        return view('course_students.create', compact('students', 'courses', 'commissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        CourseStudent::create($request->all());

        return redirect()->route('course_students.index')->with('success', 'Inscripción creada correctamente.');
    }

    public function edit(CourseStudent $courseStudent)
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();
        return view('course_students.edit', compact('courseStudent', 'students', 'courses', 'commissions'));
    }

    public function update(Request $request, CourseStudent $courseStudent)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        $courseStudent->update($request->all());

        return redirect()->route('course_students.index')->with('success', 'Inscripción actualizada correctamente.');
    }

    public function destroy(CourseStudent $courseStudent)
    {
        $courseStudent->delete();

        return redirect()->route('course_students.index')->with('success', 'Inscripción eliminada correctamente.');
    }
}
