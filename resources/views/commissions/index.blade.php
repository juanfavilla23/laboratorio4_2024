@extends('layouts.app')

@section('title', 'Comisiones')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Listado de Comisiones</h3>
                    <a href="{{ route('commissions.create') }}" class="btn btn-primary">Crear Comisión</a>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('commissions.index') }}" class="mb-3">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por horario" value="{{ $search }}">
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
                    @if($commissions->isEmpty())
                        <p class="text-center">No hay comisiones registradas.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Aula</th>
                                    <th>Horario</th>
                                    <th>Curso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($commissions as $commission)
                                    <tr>
                                        <td>{{ $commission->id }}</td>
                                        <td>{{ $commission->aula }}</td>
                                        <td>{{ $commission->horario }}</td>
                                        <td>{{ $commission->course->name }}</td>
                                        <td>
                                            <a href="{{ route('commissions.edit', $commission->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $commissions->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
