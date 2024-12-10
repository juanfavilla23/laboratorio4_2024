@extends('layouts.app')

@section('title', 'Inscripciones de Estudiantes')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Listado de Inscripciones</h3>
                    <a href="{{ route('course_students.create') }}" class="btn btn-primary">Crear Inscripción</a>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('course_students.index') }}" class="mb-3">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre de estudiante" value="{{ $search }}">
                            <select name="course_id" class="form-control ml-2">
                                <option value="">Todos los cursos</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == $courseId ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="commission_id" class="form-control ml-2">
                                <option value="">Todas las comisiones</option>
                                @foreach($commissions as $commission)
                                    <option value="{{ $commission->id }}" {{ $commission->id == $commissionId ? 'selected' : '' }}>
                                        {{ $commission->aula }} - {{ $commission->horario }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                            </div>
                        </div>
                    </form>
                    @if($courseStudents->isEmpty())
                        <p class="text-center">No hay inscripciones registradas.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Estudiante</th>
                                    <th>Curso</th>
                                    <th>Comisión</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courseStudents as $courseStudent)
                                    <tr>
                                        <td>{{ $courseStudent->id }}</td>
                                        <td>{{ $courseStudent->student->name }}</td>
                                        <td>{{ $courseStudent->course->name }}</td>
                                        <td>{{ $courseStudent->commission->aula }} - {{ $courseStudent->commission->horario }}</td>
                                        <td>
                                            <a href="{{ route('course_students.edit', $courseStudent->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('course_students.destroy', $courseStudent->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $courseStudents->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
