<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Inscripción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">ID:</label>
                            <p>{{ $inscripcion->id }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Estudiante:</label>
                            <p>{{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Curso:</label>
                            <p>{{ $inscripcion->curso->nombre }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Fecha Inscripción:</label>
                            <p>{{ $inscripcion->fecha_inscripcion }}</p>
                        </div>

                        <div class="flex space-x-4">
                            <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Editar
                            </a>
                            <a href="{{ route('inscripciones.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Volver
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>