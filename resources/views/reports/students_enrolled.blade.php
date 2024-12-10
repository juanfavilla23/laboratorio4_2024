@extends('layouts.app')

@section('title', 'Reporte de Estudiantes Inscritos')

@section('content')
<div class="container mt-5">
    <h3>Reporte de Estudiantes Inscritos</h3>
    <a href="{{ route('report.export.excel', 'students_enrolled') }}" class="btn btn-success mb-3">Exportar a Excel</a>
    <a href="{{ route('report.export.pdf', 'students_enrolled') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Cursos</th>
                <th>Comisiones</th>
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
                            {{ $course->name }},
                        @endforeach
                    </td>
                    <td>
                        @foreach($student->commissions as $commission)
                            {{ $commission->aula }} - {{ $commission->horario }},
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
