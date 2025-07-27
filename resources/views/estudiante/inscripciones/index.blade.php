@extends('layouts.estudiante')
@section('contenido')
    <div class="titulo-pagina">
        <h1>Mis cursos</h1>
    </div>
    
     @if ($cursos->isEmpty())
        <p class="texto-mensaje">No estás inscrito en ningún curso.</p>
    @else
        <section class="content-inscripcion">
            @foreach ($cursos as $curso)
                <section class="inscripcion">
                    @if($curso->imagen)
                        <img src="{{ asset('storage/' . $curso->imagen) }}" width="150">
                    @endif
                    <div class="texto-inscripcion">
                        <h3>{{ $curso->nombre }}</h3>
                        <p>{{ $curso->descripcion }}</p>
                        <p>Fecha inicio: {{ $curso->f_inicio }}</p>
                        <p>Fecha fin: {{ $curso->f_fin }}</p>
                        <p>Fecha de la inscripcion : {{ $curso->pivot->fecha_hora }}</p>
                    </div>
                    
                </section>
            @endforeach
        </section>
    @endif
@endsection