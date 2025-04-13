<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Inscripción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('inscripciones.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="estudiante_id">Estudiante</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="estudiante_id" name="estudiante_id" required>
                                <option value="">Seleccione un estudiante</option>
                                @foreach($estudiantes as $estudiante)
                                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="curso_id">Curso</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="curso_id" name="curso_id" required>
                                <option value="">Seleccione un curso</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inscripcion">Fecha Inscripción</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fecha_inscripcion" name="fecha_inscripcion" type="date" value="{{ date('Y-m-d')