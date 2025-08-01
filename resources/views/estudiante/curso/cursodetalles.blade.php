@extends('layouts.estudiante')
@section('contenido')
    @php
        $yaInscrito = \App\Models\Inscripcion::where('estudiante_id', auth()->id())->where('curso_id', $curso->id)->exists();
    @endphp
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
        
        
        <div class="botones-curso">
            @if ($yaInscrito)
                <p class="texto-mensaje">Ya estás inscrito en este curso</p>
            @elseif(!$yaInscrito)
                <form action="{{ route('inscripcion.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                    <button class="boton" type="submit">Inscribirse</button>
                </form>
            @endif
        </div>
        
    </section>
@endsection