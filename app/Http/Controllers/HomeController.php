<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cursos;

class HomeController extends Controller
{
    //
    public function index() {
        if(Auth::check()) {
            $usuario = Auth::user();

            return $usuario->id_rol === 0 ? redirect()->route('admin.dashboard') : redirect()->route('estudiante.paginaprincipal');
        }
        return view('home.index');
    }

    public function curso() {
        $cursos = Cursos::all();
        return view('home.cursos', compact('cursos'));
    }

    public function cursodetalles($id) {
        $curso = Cursos::find($id);
        return view('home.cursodetalles', compact('curso'));
    }
}
