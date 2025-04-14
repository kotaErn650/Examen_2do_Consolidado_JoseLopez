@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Inscripción</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inscripciones.update', $inscripcion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="estudiante_id">Estudiante</label>
                <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}" {{ $estudiante->id == $inscripcion->estudiante_id ? 'selected' : '' }}>
                            {{ $estudiante->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="curso_id">Curso</label>
                <select name="curso_id" id="curso_id" class="form-control" required>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $curso->id == $inscripcion->curso_id ? 'selected' : '' }}>
                            {{ $curso->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="fecha_inscripcion">Fecha de inscripción</label>
                <input type="date" name="fecha_inscripcion" id="fecha_inscripcion" class="form-control"
                       value="{{ $inscripcion->fecha_inscripcion ? $inscripcion->fecha_inscripcion->format('Y-m-d') : old('fecha_inscripcion') }}"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
