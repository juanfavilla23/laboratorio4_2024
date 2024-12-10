@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Listado de Cursos</h3>
                    <a href="{{ route('courses.create') }}" class="btn btn-primary">Crear Curso</a>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('courses.index') }}" class="mb-3">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre" value="{{ $search }}">
                            <select name="subject_id" class="form-control ml-2">
                                <option value="">Todas las materias</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $subject->id == $subjectId ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                            </div>
                        </div>
                    </form>
                    @if($courses->isEmpty())
                        <p class="text-center">No hay cursos registrados.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Materia</th>
                                    <th>Comisiones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->subject->name }}</td>
                                        <td>
                                            @foreach($course->commissions as $commission)
                                                <span class="badge badge-info">{{ $commission->aula }} - {{ $commission->horario }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $courses->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
