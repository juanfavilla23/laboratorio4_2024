@extends('layouts.app')

@section('title', 'Crear Inscripción')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Inscripción</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('course_students.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Estudiante</label>
                            <select class="form-control" id="student_id" name="student_id" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Curso</label>
                            <select class="form-control" id="course_id" name="course_id" required>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="commission_id" class="form-label">Comisión</label>
                            <select class="form-control" id="commission_id" name="commission_id" required>
                                @foreach($commissions as $commission)
                                    <option value="{{ $commission->id }}">{{ $commission->aula }} - {{ $commission->horario }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

