@extends('layouts.auth')
@section('contenido')
    <div class="conten-form">
        <div class="titulo-form">
            <h1>Inicio de sesión</h1>
        </div>
        <form class="form" action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="campo">
                <label>Documento o email*</label>
                <input type="text" name="documento" required>
            </div>
            
            <div class="campo">
                <label>Contraseña*</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="boton">Iniciar sesión</button>
        </form>
        <p>Si no tiene una cuenta <a href="{{ route('registro.form') }}">Registrese aquí</a></p>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection