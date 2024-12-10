@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-12">
            <form action="{{ route('search') }}" method="GET" class="mb-3">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" name="query" class="form-control" placeholder="Buscar estudiantes por nombre o email" value="{{ old('query') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bienvenido al Dashboard</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Este es el panel principal de tu aplicación de gestión escolar. Utiliza las tarjetas a continuación para acceder a las diferentes funcionalidades del sistema.</p>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Estudiantes</h5>
                    <p class="card-text">{{ $studentsCount }} estudiantes registrados</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('students.index') }}" class="btn btn-light">Ver Estudiantes</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">Materias</h5>
                    <p class="card-text">{{ $subjectsCount }} materias registradas</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('subjects.index') }}" class="btn btn-light">Ver Materias</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">{{ $coursesCount }} cursos registrados</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('courses.index') }}" class="btn btn-light">Ver Cursos</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Comisiones</h5>
                    <p class="card-text">{{ $commissionsCount }} comisiones registradas</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('commissions.index') }}" class="btn btn-light">Ver Comisiones</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Profesores</h5>
                    <p class="card-text">{{ $professorsCount }} profesores registrados</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('professors.index') }}" class="btn btn-light">Ver Profesores</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Inscripciones de Estudiantes</h5>
                    <p class="card-text">{{ $courseStudentsCount }} inscripciones registradas</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('course_students.index') }}" class="btn btn-light">Ver Inscripciones</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menú de Reportes -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title">Reportes</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('reports.students_enrolled') }}" class="btn btn-outline-primary btn-block">Estudiantes Inscritos</a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('reports.courses_by_subject') }}" class="btn btn-outline-secondary btn-block">Cursos por Materia</a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('reports.commissions_and_schedules') }}" class="btn btn-outline-success btn-block">Comisiones y Horarios</a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('reports.professors_attendance') }}" class="btn btn-outline-warning btn-block">Asistencia de Profesores</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Actualizado recientemente
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
