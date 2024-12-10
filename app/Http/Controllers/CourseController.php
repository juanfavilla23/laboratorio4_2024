<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Commission;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $subjectId = $request->input('subject_id');

        $courses = Course::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->when($subjectId, function ($query, $subjectId) {
            return $query->where('subject_id', $subjectId);
        })->paginate(10);

        $subjects = Subject::all();

        return view('courses.index', compact('courses', 'search', 'subjects', 'subjectId'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('courses.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Curso creado correctamente.');
    }

    public function edit(Course $course)
    {
        $subjects = Subject::all();
        return view('courses.edit', compact('course', 'subjects'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado correctamente.');
    }
}
