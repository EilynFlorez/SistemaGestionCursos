<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function show() {
        return view('estudiante.paginaprincipal');
    }
}
