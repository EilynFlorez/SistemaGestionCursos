<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inscripcion;
use App\Models\Cursos;
use App\Models\Usuario;

class InscripcionController extends Controller
{
    public function index() {
        $usuario = Auth::user();
        $cursos = $usuario->cursosInscritos;
        return view('estudiante.inscripciones.index', compact('cursos'));
    }

    public function store(Request $request) {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $curso = Cursos::find($request->curso_id);
        if ($curso->cupos_disponibles <= 0) {
            return redirect()->back()->with('error', 'No hay cupos disponibles para este curso.');
        }
        $curso->cupos_disponibles -= 1;
        $curso->save();

        $usuarioId = Auth::id(); 

        $yaInscrito = Inscripcion::where('estudiante_id', $usuarioId)->where('curso_id', $request->curso_id)->exists();

        if ($yaInscrito) {
            return redirect()->back()->with('error', 'Ya estás inscrito en este curso.');
        }

        Inscripcion::create([
            'curso_id' => $request->curso_id,
            'estudiante_id' => $usuarioId,
            'fecha_hora' => now(),
        ]);

        return redirect()->back()->with('success', '¡Inscripción realizada con éxito!');
    }
}
