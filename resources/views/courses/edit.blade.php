@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Curso</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject_id" class="form-label">Materia</label>
                            <select class="form-control" id="subject_id" name="subject_id" required>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $subject->id == $course->subject_id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            @section('content')
        </div>
    </div>
</div>
@endsection
