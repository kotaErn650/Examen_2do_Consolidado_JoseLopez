<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">ID:</label>
                        <p>{{ $estudiante->id }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <p>{{ $estudiante->nombre }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                        <p>{{ $estudiante->apellido }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Nacimiento:</label>
                        <p>{{ $estudiante->fecha_nacimiento }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <p>{{ $estudiante->email }}</p>
                    </div>

                    <div class="flex items-center justify-start space-x-4">
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded">
                            Editar
                        </a>
                        <a href="{{ route('estudiantes.cursos', $estudiante->id) }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                            Ver Cursos
                        </a>
                        <a href="{{ route('estudiantes.index') }}" class="bg-gray-500 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>