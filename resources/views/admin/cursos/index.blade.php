@extends('layouts.admin')
@section('titulo', 'Cursos')

@section('contenido')
    <div class="crearcurso">
        <a href="{{ route('crearcurso.form') }}"><button class="boton">Crear Curso</button></a>
    </div>
    
    <section class="contenedor-cursos">
        @foreach ($cursos as $curso)
            <article class="tarjeta-curso">
                <div class="contenido-curso">
                    <div>
                        @if($curso->imagen)
                            <img src="{{ asset('storage/' . $curso->imagen) }}" width="150">
                        @endif
                    </div>
                    <div class="texto-curso">
                        <h1>{{$curso->nombre}}</h1>
                        <p class="texto-largo">{{$curso->descripcion}}</p>
                    </div>
                </div>
                
                <div class="botones-curso">
                    <a href="{{ route('editarcurso.form', $curso->id) }}"><button class="boton">Editar</button></a>
                    <form action="{{ route('eliminarcurso', $curso->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="boton" onclick="return confirm('¿Está seguro de qué desea eliminar este curso?')">Eliminar</button>
                    </form>
                    <a href="{{ route('cursoinscripciones.show', $curso->id) }}"><button class="boton">Ver más información</button></a>
                </div>
            </article>
        @endforeach
    </section>
@endsection
