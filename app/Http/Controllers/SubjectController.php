<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::paginate(10);
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Materia creada correctamente.');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Materia eliminada correctamente.');
    }
}
