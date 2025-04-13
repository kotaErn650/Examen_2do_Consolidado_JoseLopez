<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudianteRequest;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     * 
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {

        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|string|email|unique:estudiantes,email',
        ]);

        $estudiante = new Estudiante();
        $estudiante->nombre = $validated['nombre'];
        $estudiante->apellido = $validated['apellido'];
        $estudiante->fecha_nacimiento = $validated['fecha_nacimiento'];
        $estudiante->email = $validated['email'];
        $estudiante->save();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));

    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Estudiante $estudiante
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre'=>'required|string|max:255',
            'apellido'=>'required|string|max:255',
            'fecha_nacimiento'=>'required|date',
            'email'=>'required|string|email|unique:estudiantes,email,'.$estudiante->id,
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante eliminado exitosamente.');
    }

    public function showCursos(Estudiante $estudiante)
    {
        $cursos = $estudiante->cursos()->get();
        return view('estudiantes.cursos', compact('estudiante', 'cursos'));
    }

}
