<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Estudiante;
use App\Models\Curso;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::with(['estudiante', 'curso'])->get();
        return view('inscripciones.index', compact('inscripciones'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        return view('inscripciones.create', compact('estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_inscripcion' => 'nullable|date',
        ]);

        $existe = Inscripcion::where('estudiante_id', $request->estudiante_id)
            ->where('curso_id', $request->curso_id)
            ->exists();

        if ($existe) {
            return back()->with('error', 'El estudiante ya está inscrito en este curso.');
        }

        $data = $request->all();
        $data['fecha_inscripcion'] = $request->fecha_inscripcion ?: now();

        Inscripcion::create($data);

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción creada exitosamente.');
    }

    public function show(Inscripcion $inscripcion)
    {
        $inscripcion->load(['estudiante', 'curso']);
        return view('inscripciones.show', compact('inscripcion'));
    }

    public function edit(Inscripcion $inscripcion)
    {
        $inscripcion = Inscripcion::with(['estudiante', 'curso'])->findOrFail($id);
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
    
        return view('inscripciones.edit', compact('inscripcion', 'estudiantes', 'cursos'));
    }

    public function update(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_inscripcion' => 'nullable|date',
        ]);
    
        // Si no se proporciona una fecha de inscripción, usa la actual
        $data = $request->all();
        $data['fecha_inscripcion'] = $request->fecha_inscripcion ?: $inscripcion->fecha_inscripcion;
    
        $inscripcion->update($data);
    
        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción actualizada correctamente.');
    }

    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();
        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción eliminada correctamente.');
    }
}
