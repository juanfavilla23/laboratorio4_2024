@extends('layouts.app')

@section('title', 'Reporte de Asistencia de Profesores')

@section('content')
<div class="container mt-5">
    <h3>Reporte de Asistencia de Profesores</h3>
    <a href="{{ route('report.export.excel', 'professors_attendance') }}" class="btn btn-success mb-3">Exportar a Excel</a>
    <a href="{{ route('report.export.pdf', 'professors_attendance') }}" class="btn btn-danger mb-3">Exportar a PDF</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Comisiones Asignadas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->name }}</td>
                    <td>
                        @foreach($professor->commissions as $commission)
                            {{ $commission->aula }} - {{ $commission->horario }},
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
