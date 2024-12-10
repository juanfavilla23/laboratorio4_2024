@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Listado de Estudiantes</h3>
                    <a href="{{ route('students.create') }}" class="btn btn-primary">Crear Estudiante</a>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o email" value="{{ $search }}">
                            <select name="course_id" class="form-control ml-2">
                                <option value="">Todos los cursos</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $course->id == $courseId ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                            </div>
                        </div>
                    </form>
                    @if($students->isEmpty())
                        <p class="text-center">No hay estudiantes registrados.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Cursos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            @foreach($student->courses as $course)
                                                <span class="badge badge-info">{{ $course->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
