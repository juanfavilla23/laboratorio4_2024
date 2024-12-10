@extends('layouts.app')

@section('title', 'Materias')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Listado de Materias</h3>
                    <a href="{{ route('subjects.create') }}" class="btn btn-primary">Crear Materia</a>
                </div>
                <div class="card-body">
                    @if($subjects->isEmpty())
                        <p class="text-center">No hay materias registradas.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->id }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>
                                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $subjects->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
