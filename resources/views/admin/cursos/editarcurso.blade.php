@extends('layouts.admin')
@section('titulo', 'Editar curso')

@section('contenido')
    <div class="cont-for">
        <form class="formulario" action="{{ route('editarcurso.store', $id->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            <div class="campo">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{$id->nombre}}">
            </div>

            <div class="campo">
                <label>Descripción</label>
                <textarea name="descripcion">{{$id->descripcion}}</textarea>
            </div>

            <div class="campo">
                @if($id->imagen)
                    <p>Imagen actual</p>
                    <img src="{{ asset('storage/' . $id->imagen) }}" width="150">
                    <label>Seleccione la nueva imagen:</label>
                    <input type="file" name="imagen" accept=".jpg,.jpeg,.png">
                @endif
            </div>

            <div class="campo">
                <label>Cupos disponibles</label>
                <input type="number" name="cupos_disponibles" value="{{$id->cupos_disponibles}}">
            </div>

            <div class="campo">
                <label>Fecha de inicio</label>
                <input type="date" name="f_inicio" min="{{ date('Y-m-d') }}" value="{{$id->f_inicio}}">
            </div>

            <div class="campo">
                <label>Fecha de finalización</label>
            <input type="date" name="f_fin" min="{{ date('Y-m-d') }}" value="{{$id->f_fin}}">
            </div>

            <button type="submit" class="boton">Editar curso</button>
        </form>
    </div>
    

    @if ($errors->any())
        <div style="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection