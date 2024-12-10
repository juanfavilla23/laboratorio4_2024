@extends('layouts.app')

@section('title', 'Editar Profesor')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Volver al Dashboard</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Profesor</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('professors.update', $professor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $professor->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $professor->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="commission_ids" class="form-label">Comisiones</label>
                            <select class="form-control" id="commission_ids" name="commission_ids[]" multiple>
                                @foreach($commissions as $commission)
                                    <option value="{{ $commission->id }}" {{ in_array($commission->id, $professor->commissions->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $commission->aula }} - {{ $commission->horario }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
