<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function show() {
        if(Auth::check()) {
            $usuario = Auth::user();

            return $usuario->id_rol === 0 ? redirect()->route('admin.dashboard') : redirect()->route('estudiante.paginaprincipal');
        }
        return view('home.index');
    }
}
