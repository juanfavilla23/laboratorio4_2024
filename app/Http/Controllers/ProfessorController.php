<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Commission;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $professors = Professor::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);
        
        return view('professors.index', compact('professors', 'search'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Professor::create($request->all());

        return redirect()->route('professors.index')->with('success', 'Profesor creado correctamente.');
    }

    public function edit(Professor $professor)
    {
        $commissions = Commission::all();
        return view('professors.edit', compact('professor', 'commissions'));
    }

    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'commission_ids' => 'array',
        ]);

        $professor->update($request->all());

        if ($request->has('commission_ids')) {
            $professor->commissions()->sync($request->input('commission_ids'));
        }

        return redirect()->route('professors.index')->with('success', 'Profesor actualizado correctamente.');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Profesor eliminado correctamente.');
    }
}
