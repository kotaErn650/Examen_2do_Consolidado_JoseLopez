<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(!$curso)
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <p>Curso no encontrado</p>
                </div>
            @else
                <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100 max-w-2xl mx-auto">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $curso->nombre }}</h3>

                    <div class="space-y-3">
                        <p class="text-sm text-gray-600">
                            <span class="font-bold">ID:</span> {{ $curso->id }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <span class="font-bold">Descripción:</span>
                            {{ $curso->descripcion ?? 'N/A' }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <span class="font-bold">Duración:</span> 
                            {{ $curso->duracion }} horas
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3 mt-6">
                        <a href="{{ route('cursos.edit', $curso->id) }}"
                           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-4 rounded transition">
                            Editar
                        </a>
                        <a href="{{ route('cursos.estudiantes', $curso->id) }}"
                           class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded transition">
                            Estudiantes
                        </a>
                        <a href="{{ route('cursos.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium py-2 px-4 rounded transition">
                            Volver al Listado
                        </a>
                    </div>
                </div>
            @endif
        </div