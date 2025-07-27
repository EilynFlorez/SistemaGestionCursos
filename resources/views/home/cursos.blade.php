@extends('layouts.home')
@section('contenido')
    <div class="titulo-pagina">
        <h1>Cursos disponibles</h1>
    </div>
    <section class="content-cursos">
        @foreach ($cursos as $curso)
        
            @if($curso->cupos_disponibles > 0 && !($curso->fecha_inicio instanceof \Carbon\Carbon && !$curso->fecha_inicio->lt(today())))
            <article class="curso">
                @if($curso->imagen)
                    <img src="{{ asset('storage/' . $curso->imagen) }}" width="150">
                @endif
                <div class="curso-texto">
                    <h2>{{ $curso->nombre }}</h2>
                    <p class="texto-largo">{{ $curso->descripcion }}</p>
                    <a href="{{ route('curso.detalles', $curso->id) }}"><button class="boton-2">Ver más</button></a>
                </div>
                
            </article>
            @endif
        @endforeach
    </section>
@endsection