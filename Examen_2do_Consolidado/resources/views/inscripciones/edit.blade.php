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
                {{ __('Editar Inscripción') }} #{{ $inscripcion->id }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Mensajes de sesión - Igual que en index -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Formulario con misma estructura que index -->
                        <form method="POST" action="{{ route('inscripciones.update', $inscripcion->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Estructura de campos similar a la tabla del index -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Estudiante</label>
                                    <select name="estudiante_id" class="form-select" required>
                                        @foreach($estudiantes as $estudiante)
                                            <option value="{{ $estudiante->id }}" 
                                                {{ $inscripcion->estudiante_id == $estudiante->id ? 'selected' : '' }}>
                                                {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Curso</label>
                                    <select name="curso_id" class="form-select" required>
                                        @foreach($cursos as $curso)
                                            <option value="{{ $curso->id }}" 
                                                {{ $inscripcion->curso_id == $curso->id ? 'selected' : '' }}>
                                                {{ $curso->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Fecha Inscripción</label>
                                    <input type="date" name="fecha_inscripcion" 
                                           value="{{ $inscripcion->fecha_inscripcion->format('Y-m-d') }}" 
                                           class="form-control" required>
                                </div>
                            </div>

                            <!-- Botones con mismo estilo que index -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Actualizar
                                </button>
                                
                                <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Volver al Listado
                                </a>
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