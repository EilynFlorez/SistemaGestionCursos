@extends('layouts.auth')
@section('contenido')
    <div class="conten-form">
        <div class="titulo-form">
            <h1>Registrarse</h1>
        </div>
        <form class="form" action="{{ route('registro.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_rol" value="1" >
            <div class="campo">
                <label>Tipo de documento*</label>
                <select name="tipo_documento" required>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="CE">Cédula de Extranjería</option>
                    <option value="PEP">Permiso Especial de Permanencia</option>
                    <option value="PPT">Permiso por Protección temporal</option>
                </select>
            </div>

            <div class="campo">
                <label>Documento*</label>
                <input type="text" name="documento" required>
            </div>
        
            <div class="campo">
                <label>Nombres*</label>
                <input type="text" name="nombres" required>
            </div>
            
            <div class="campo">
                <label>Primer apellido*</label>
                <input type="text" name="papellido" required>
            </div>
            
            <div class="campo">
                <label>Segundo apellido*</label>
                <input type="text" name="sapellido" required>
            </div>
            
            <div class="campo">
                <label>Edad*</label>
                <input type="number" name="edad" required>
            </div>
            
            <div class="campo">
                <label>Genero*</label>
                <select name="genero" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            
            <div class="campo">
                <label>Correo electrónico*</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="campo">
                <label>Contraseña*</label>
                <input type="password" name="password" required>
            </div>
            
            <div class="campo">
                <label>Confirmar contraseña*</label>
                <input type="password" name="password_confirmacion" required>
            </div>

            <button class="boton" type="submit">Registrarse</button>
        </form>

        <p>Si ya tienes una cuenta <a href="{{ route('login') }}">Inicie sesión</a></p>

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