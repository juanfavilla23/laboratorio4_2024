<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $courseId = $request->input('course_id');

        $commissions = Commission::when($search, function ($query, $search) {
            return $query->where('aula', 'like', "%{$search}%")
                         ->orWhere('horario', 'like', "%{$search}%");
        })->when($courseId, function ($query, $courseId) {
            return $query->where('course_id', $courseId);
        })->paginate(10);

        $courses = Course::all();
        $professors = Professor::all();

        return view('commissions.index', compact('commissions', 'search', 'courses', 'courseId', 'professors'));
    }

    public function create()
    {
        $courses = Course::all();
        $professors = Professor::all();
        return view('commissions.create', compact('courses', 'professors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'nullable|exists:professors,id',
        ]);

        Commission::create($request->all());

        return redirect()->route('commissions.index')->with('success', 'Comisión creada correctamente.');
    }

    public function edit(Commission $commission)
    {
        $courses = Course::all();
        $professors = Professor::all();
        return view('commissions.edit', compact('commission', 'courses', 'professors'));
    }

    public function update(Request $request, Commission $commission)
    {
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'professor_id' => 'nullable|exists:professors,id',
        ]);

        $commission->update($request->all());

        return redirect()->route('commissions.index')->with('success', 'Comisión actualizada correctamente.');
    }

    public function destroy(Commission $commission)
    {
        $commission->delete();

        return redirect()->route('commissions.index')->with('success', 'Comisión eliminada correctamente.');
    }
}
