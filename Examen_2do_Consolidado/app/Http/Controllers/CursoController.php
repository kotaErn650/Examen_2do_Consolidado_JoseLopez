<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     * 
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'duracion' => 'required|integer|min:1',
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso creado exitosamente.'); 
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     */
    public function update(Request $request, Cursos $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'duracion' => 'required|integer|min:1',
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curtso->delete();
        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado exitosamente.');
    }

    public function ShowEstudiantes(Curso $curso)
    {
        $estudiantes + $curso->estudiantes()->paginate(10);
        return view('cursos.estudiantes', compact('curso', 'estudiantes'));
    }
}
