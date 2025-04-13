<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($cursos as $curso)
                    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $curso->nombre }}</h3>

                        <p class="text-sm text-gray-600 mb-2"><span class="font-bold">ID:</span> {{ $curso->id }}</p>
                        <p class="text-sm text-gray-600 mb-2">
                            <span class="font-bold">Descripción:</span>
                            {{ $curso->descripcion ?? 'N/A' }}
                        </p>
                        <p class="text-sm text-gray-600 mb-4"><span class="font-bold">Duración:</span> {{ $curso->duracion }} horas</p>

                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('cursos.edit', $curso->id) }}"
                               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-1.5 px-3 rounded transition">
                                ✏️ Editar
                            </a>
                            <a href="{{ route('cursos.estudiantes', $curso->id) }}"
                               class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-1.5 px-3 rounded transition">
                                👨‍🎓 Estudiantes
                            </a>
                            <a href="{{ route('cursos.index') }}"
                               class="bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium py-1.5 px-3 rounded transition">
                                🔙 Volver
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
