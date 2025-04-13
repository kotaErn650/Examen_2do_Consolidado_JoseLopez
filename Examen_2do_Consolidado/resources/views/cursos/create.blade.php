<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👩🏻‍🎓Estudiantes </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid justify-content-start">
                <a href="{{ route('dashboard') }}" class="btn btn-info  me-2">◀️Return to DASHBOARD</a>
                
                <a href="{{ route('inscripciones.index') }}" class="btn btn-info me-2">Ir a Inscripciones</a>
                <a href="{{ route('estudiantes.index') }}" class="btn btn-info me-2">Ir a Estudiantes</a>     
        </div>
    </nav>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('cursos.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="duracion" class="block text-gray-700 text-sm font-bold mb-2">Duración (horas):</label>
                            <input type="number" name="duracion" id="duracion" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="btn btn-info text-blue-600 hover:text-blue-900 mr-2">
                                Guardar
                            </button>
                            <a href="{{ route('cursos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-b font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Cancelar
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