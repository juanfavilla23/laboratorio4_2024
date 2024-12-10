@extends('layouts.app')

@section('title', 'Crear Comisión')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Comisión</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('commissions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="aula" class="form-label">Aula</label>
                            <input type="text" class="form-control" id="aula" name="aula" required>
                        </div>
                        <div class="mb-3">
                            <label for="horario" class="form-label">Horario</label>
                            <input type="text" class="form-control" id="horario" name="horario" required>
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
                            <label for="professor_id" class="form-label">Profesor</label>
                            <select class="form-control" id="professor_id" name="professor_id">
                                <option value="">-- Seleccionar Profesor --</option>
                                @foreach($professors as $professor)
                                    <option value="{{ $professor->id }}">{{ $professor->name }}</option>
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
