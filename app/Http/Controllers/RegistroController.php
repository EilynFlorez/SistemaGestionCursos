<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    //
    public function create() {
        if(Auth::check()) {
            $usuario = Auth::user();

            return $usuario->id_rol === 0 ? redirect()->route('admin.dashboard') : redirect()->route('estudiante.paginaprincipal');
        }
        return view('auth.registro');
    }
    public function store(RegistroRequest $request) {
        $usuario = Usuario::create($request->validated());
        return redirect()->route('login');
    }
}
