@extends('layouts.app')

@section('title', 'Reporte de Comisiones y Horarios')

@section('content')
<div class="container mt-5">
    <h3>Reporte de Comisiones y Horarios</h3>
    <a href="{{ route('report.export.excel', 'commissions_and_schedules') }}" class="btn btn-success mb-3">Exportar a Excel</a>
    <a href="{{ route('report.export.pdf', 'commissions_and_schedules') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Horario</th>
                <th>Curso</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commissions as $commission)
                <tr>
                    <td>{{ $commission->id }}</td>
                    <td>{{ $commission->aula }}</td>
                    <td>{{ $commission->horario }}</td>
                    <td>{{ $commission->course->name }}</td>
                    <td>{{ $commission->professor->name ?? 'No asignado' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
