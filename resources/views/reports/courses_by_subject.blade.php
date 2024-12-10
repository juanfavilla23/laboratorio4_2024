@extends('layouts.app')

@section('title', 'Reporte de Cursos por Materia')

@section('content')
<div class="container mt-5">
    <h3>Reporte de Cursos por Materia</h3>
    <a href="{{ route('report.export.excel', 'courses_by_subject') }}" class="btn btn-success mb-3">Exportar a Excel</a>
    <a href="{{ route('report.export.pdf', 'courses_by_subject') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
    @foreach($courses as $subject => $subjectCourses)
        <h4>{{ $subject }}</h4>
        <ul>
            @foreach($subjectCourses as $course)
                <li>{{ $course->name }}</li>
            @endforeach
        </ul>
    @endforeach
</div>
@endsection
