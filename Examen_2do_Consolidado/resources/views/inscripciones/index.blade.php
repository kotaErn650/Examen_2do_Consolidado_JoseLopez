<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripciones</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
        <nav class="navbar bg-dark">
            <div class="container-fluid justify-content-start">
                    <a href="{{ route('dashboard') }}" class="btn btn-info  me-2">◀️Return to DASHBOARD</a>
            </div>
        </nav>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Inscripciones') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <a href="{{ route('inscripciones.create') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                            Crear Inscripción
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estudiante</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Curso</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Inscripción</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($inscripciones as $inscripcion)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscripcion->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscripcion->curso->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscripcion->fecha_inscripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('inscripciones.show', $inscripcion->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Ver</a>
                                        <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                        <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>