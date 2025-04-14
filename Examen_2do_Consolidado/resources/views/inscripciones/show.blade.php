<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Inscripción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Columna izquierda - Datos básicos -->
                        <div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Fecha Inscripción:</label>
                                <p>
                                    @isset($inscripcion->fecha_inscripcion)
                                        {{ $inscripcion->fecha_inscripcion->format('d/m/Y H:i') }}
                                    @else
                                        <span class="text-gray-500">Fecha no especificada</span>
                                    @endisset
                                </p>
                        </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Inscripción:</label>
                                <p class="text-gray-800">{{ $inscripcion->fecha_inscripcion->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Columna derecha - Relaciones -->
                        <div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Estudiante:</label>
                                <p class="text-gray-800">
                                    @if($inscripcion->estudiante)
                                        <a href="{{ route('estudiantes.show', $inscripcion->estudiante_id) }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido }}
                                        </a>
                                    @else
                                        <span class="text-red-500">Estudiante no encontrado (ID: {{ $inscripcion->estudiante_id }})</span>
                                    @endif
                                </p>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Curso:</label>
                                <p class="text-gray-800">
                                    @if($inscripcion->curso)
                                        <a href="{{ route('cursos.show', $inscripcion->curso_id) }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $inscripcion->curso->nombre }}
                                        </a>
                                    @else
                                        <span class="text-red-500">Curso no encontrado (ID: {{ $inscripcion->curso_id }})</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex flex-wrap gap-4 mt-8 pt-4 border-t border-gray-200">
                        <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" 
                           class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Editar Inscripción
                        </a>

                        <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded flex items-center"
                                    onclick="return confirm('¿Estás seguro de eliminar esta inscripción?')">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Eliminar Inscripción
                            </button>
                        </form>

                        <a href="{{ route('inscripciones.index') }}" 
                           class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Volver al Listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>