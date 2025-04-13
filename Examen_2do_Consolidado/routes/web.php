<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InscripcionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('inscripciones', InscripcionController::class);

    
    Route ::get ('estudiantes.index',[EstudianteController::class, 'index'])->name('estudiantes.index');
    Route ::get ('estudiantes/{estudiante}/cursos',[EstudianteController::class, 'showCursos'])->name('estudiantes.cursos');
    Route ::get ('estudiantes.create',[EstudianteController::class, 'create'])->name('estudiantes.create');
    Route :: get('estudiantes.edit',[EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route ::post ('estudiantes.store',[EstudianteController::class, 'store'])->name('estudiantes.store');
    Route ::put ('estudiantes.update',[EstudianteController::class, 'update'])->name('estudiantes.update');
    Route ::get('estudiantes.show',[EstudianteController::class, 'show'])->name('estudiantes.show');
    
    Route ::get('estudiantes.cursos',[EstudianteController::class, 'showCursos'])->name('estudiantes.cursos');
    

    Route ::get ('cursos.index',[CursoController::class, 'index'])->name('cursos.index');
    Route ::get ('cursos/{curso}/estudiantes',[CursoController::class, 'showEstudiantes'])->name('cursos.estudiantes');

    

});

require __DIR__.'/auth.php';
