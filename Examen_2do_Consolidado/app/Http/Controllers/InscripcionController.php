<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscripcionRequest;
use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = Inscripcion::with(['estudiante', 'curso'])->get();
        return view('inscripciones.index', compact('inscripciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        return view('inscripciones.create', compact('estudiantes', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);
        //verifico si ya existe
        $existe = Inscripcion::where('estudiante_id', $request->estudiante_id)
            ->where('curso_id', $request->curso_id)
            ->exists();
        if ($existe) {
                    return back()->with('error', 'El estudiante ya está inscrito en este curso.');
                    } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscription $inscripcion)
    {
        $inscripcion = Inscripcion::with(['estudiante', 'curso'])->findOrFail($id);
        return view('inscripciones.show', compact('inscripcion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        return view('inscripciones.edit', compact('estudiantes', 'estudiantes','cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_inscripcion' => 'required|date',
        ]);
        //valido si existe
        $existe = Inscripcion::where('estudiante_id', $request->estudiante_id)
            ->where('curso_id', $request->curso_id)
            ->where('id', '!=', $inscripcion->id)
            ->exists();
        
        if ($existe){
            return back()->with('error', 'El estudiante ya está inscrito en este curso.');
        }

        inscription->update($request->all());
            return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción actualizada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();
        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción eliminada correctamente.');
    }
}
