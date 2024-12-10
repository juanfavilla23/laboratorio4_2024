@extends('layouts.app')

@section('title', 'Profesores')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Listado de Profesores</h3>
                    <a href="{{ route('professors.create') }}" class="btn btn-primary">Crear Profesor</a>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('professors.index') }}" class="mb-3">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre" value="{{ $search }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                            </div>
                        </div>
                    </form>
                    @if($professors->isEmpty())
                        <p class="text-center">No hay profesores registrados.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Comisiones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($professors as $professor)
                                    <tr>
                                        <td>{{ $professor->id }}</td>
                                        <td>{{ $professor->name }}</td>
                                        <td>
                                            @foreach($professor->commissions as $commission)
                                                <span class="badge badge-info">{{ $commission->aula }} - {{ $commission->horario }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $professors->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
