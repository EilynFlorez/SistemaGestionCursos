<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    //

    public function show(){
        if(Auth::check()) {
            $usuario = Auth::user();

            return $usuario->id_rol === 0 ? redirect()->route('admin.dashboard') : redirect()->route('estudiante.paginaprincipal');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $credenciales = $request->getCredenciales();

        if (!Auth::attempt($credenciales)) {
            return redirect()->back()->withErrors([
                'login' => 'Credenciales incorrectas',
            ]);
        }

        $usuario = Auth::user();

        return $usuario->id_rol === 0 ? redirect()->route('admin.dashboard') : redirect()->route('estudiante.paginaprincipal');
    }
}
