<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Usuario;
use App\Models\Inscripcion;

class AdminController extends Controller
{
    public function show() {
        $totalcursos = Cursos::count();
        $totalestudiantes = Usuario::where('id_rol', 1)->count();
        $cursos = Cursos::withCount('inscripciones')->get();
        return view('admin.dashboard', compact('totalcursos', 'totalestudiantes', 'cursos'));
    }
}
