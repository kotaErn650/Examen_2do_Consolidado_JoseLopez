<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido a la Mejor Institucion!!!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- Estudiates -->
            <a href="{{ route('estudiantes.index') }}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300 block">
                <h1 class="text-lg font-bold text-red-600 mb-2">👤 Estudiantes</h1>
                <p class="text-black text-sm">Gestión de Estudiantes.</p>
            </a>

            <!-- Cursos -->
             <a href="{{route('cursos.index')}}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300 block" >
                <h1 class="text-lg font-bold text-red-600 mb-2"> 💻 Cursos</h1>
                <p class="text-black text-sm">Gestión de Cursos.</p>
             </a>

            <!-- Inscripciones -->
             <a href="{{route('inscripciones.index')}}" class="bg-white border border-red-600 hover:bg-red-50 shadow-md hover:shadow-lg rounded-2xl p-6 transition duration-300 block">
                <h1 class="text-lg font-bold text-red-600 mb-2"> 👩🏻‍🎓 Inscripciones </h1>
                <p class="text-black text-sm">Gestión de Inscripciones.</p>
             </a>
        </div>


        <div class="flex justify-center mt-10" stile= "background-image: url('/public/image/logo (1).png')">
            <img src="{{ asset('image/logo (1).png') }}" alt="Logo" class="w-1/2 h-auto">
        </div>

        
        <div class="flex justify-center mt-10">
            <h1 class="text-lg font-bold text-red-600 mb-2">
                Desarrollado por: 
                <span class="text-black font-extrabold text-2xl">José Hernando López</span>
            </h1>
        </div>
        
    </div>


                    

           
</x-app-layout>
