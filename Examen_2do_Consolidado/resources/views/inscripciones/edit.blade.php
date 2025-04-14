<!-- resources/views/inscripciones/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inscripción</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid justify-content-start">
            <a href="{{ route('dashboard') }}" class="btn btn-info me-2">◀️Return to DASHBOARD</a>
        </div>
    </nav>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Inscripción') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-4">
                            <a href="{{ route('inscripciones.index') }}" class="btn btn-info hover:bg-blue-700 font-bold py-2 px-4 rounded">
                                Volver a la lista
                            </a>
                        </div>

                        <form action="{{ route('inscripciones.update', $inscripcion->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="estudiante_id" class="form-label">Estudiante</label>
                                <select name="estudiante_id" id="estudiante_id" class="form-select" required>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}" 
                                            {{ $inscripcion->estudiante_id == $estudiante->id ? 'selected' : '' }}>
                                            {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="curso_id" class="form-label">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-select" required>
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}" 
                                            {{ $inscripcion->curso_id == $curso->id ? 'selected' : '' }}>
                                            {{ $curso->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_inscripcion" class="form-label">Fecha de Inscripción</label>
                                <input type="date" name="fecha_inscripcion" value="{{ $inscripcion->fecha_inscripcion ? $inscripcion->fecha_inscripcion->format('Y-m-d') : '' }}">

                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Actualizar Inscripción</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>
