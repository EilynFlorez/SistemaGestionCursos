@extends('layouts.admin')
@section('titulo', 'Crear Curso')

@section('contenido')
    <div class="cont-for">
        <form class="formulario" action="{{ route('crearcurso.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="campo">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="campo">
                <label>Descripción*</label>
                <textarea name="descripcion" required></textarea>
            </div>
            
            <div class="campo">
                <label>Imagen*</label>
                <input type="file" name="imagen" accept=".jpg,.jpeg,.png" required>
            </div>
            
            <div class="campo">
                <label>Cupos disponibles*</label>
                <input type="number" name="cupos_disponibles" required>
            </div>
            
            <div class="campo">
                <label>Fecha de inicio*</label>
                <input type="date" name="f_inicio" min="{{ date('Y-m-d') }}" required>
            </div>

            <div class="campo">
                <label>Fecha de finalización*</label>
                <input type="date" name="f_fin" min="{{ date('Y-m-d') }}" required>
            </div>

            <button type="submit" class="boton">Crear curso</button>
        </form>
    </div>
    
    @if ($errors->any())
        <div class="error">
            <ul class="lista-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection