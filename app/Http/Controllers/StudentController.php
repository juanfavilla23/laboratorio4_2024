<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request) 
    { 
        $search = $request->input('search'); 
        $courseId = $request->input('course_id'); 
        $students = Student::when($search, function ($query, $search) {
             return $query->where('name', 'like', "%{$search}%") ->orWhere('email', 'like', "%{$search}%"); 
            })->when($courseId, function ($query, $courseId) 
            { 
                return $query->whereHas('courses', function ($query) use ($courseId) { $query->where('id', $courseId);
                 }); 
                })->paginate(10); $courses = Course::all(); return view('students.index', compact('students', 'search', 'courses', 'courseId')); }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiante creado correctamente.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:students,email,{$student->id}",
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
