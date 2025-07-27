<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Http\Requests\CursosRequest;
use Illuminate\Support\Facades\Storage;


class CursosController extends Controller
{   
    //Admin
    public function index() {
        $cursos = Cursos::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    public function show($id) {
        $curso = Cursos::with('estudiantes')->find($id);
        return view('admin.cursos.detallescurso', compact('curso'));
    }

    public function create() {
        return view('admin.cursos.crearcurso');
    }

    public function store(CursosRequest $request) {
        $curso = new Cursos();
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;

        if($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('cursos', 'public');
            $curso->imagen = $path;
        }

        $curso->cupos_disponibles = $request->cupos_disponibles;
        $curso->f_inicio = $request->f_inicio;
        $curso->f_fin = $request->f_fin;

        $curso->save();

        return redirect()->route('cursos.index');
    }

    public function edit($curso) {
        $id = Cursos::find($curso);
        return view('admin.cursos.editarcurso', compact('id'));
    }

    public function update(CursosRequest $request, $id) { 
        $curso = Cursos::find($id);
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        if ($request->hasFile('imagen')) {
            //Eliminar imagen anterior
            if ($curso->imagen && Storage::disk('public')->exists($curso->imagen)) {
                Storage::disk('public')->delete($curso->imagen);
            }

            // Guardar nueva imagen
            $path = $request->file('imagen')->store('cursos', 'public');
            $curso->imagen = $path;
        }
        $curso->cupos_disponibles = $request->cupos_disponibles;
        $curso->f_inicio = $request->f_inicio;
        $curso->f_fin = $request->f_fin;

        $curso->save();

        return redirect()->route('cursos.index');
    }

    public function destroy($curso) {
        $id = Cursos::find($curso);
        if ($id->imagen && Storage::disk('public')->exists($id->imagen)) {
            Storage::disk('public')->delete($id->imagen);
        }

        $id->delete();

        return redirect()->route('cursos.index');
    }

    

    //Estudiante
    public function indexE() {
        $cursos = Cursos::all();
        return view('estudiante.curso.cursosdisponibles', compact('cursos'));
    }

    public function showE($id) {
        $curso = Cursos::find($id);
        return view('estudiante.curso.cursodetalles', compact('curso'));
    }
}
