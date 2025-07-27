@extends('layouts.home')
@section('contenido')
    <section class="curso-detalles">
        <div class="contenido-curso">
            <div>
                @if($curso->imagen)
                    <img src="{{ asset('storage/' . $curso->imagen) }}" width="250">
                @endif
            </div>
            <div class="texto-curso">
                <h1>{{$curso->nombre}}</h1>
                <p>{{$curso->descripcion}}</p>
                <p>Cupos disponibles: {{$curso->cupos_disponibles}}</p>
                <p>Fecha de inicio: {{$curso->f_inicio}}</p>
                <p>Fecha de finalización: {{$curso->f_fin}}</p>
            </div>
        </div>
           <a href="{{ route('login') }}"><button class="boton">Inscribirse</button></a> 
        </div>
        
    </section>
@endsection