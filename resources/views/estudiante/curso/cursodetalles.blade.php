<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso</title>
</head>
<body>
    @php
        $yaInscrito = \App\Models\Inscripcion::where('estudiante_id', auth()->id())->where('curso_id', $curso->id)->exists();
    @endphp

    @if($curso->imagen)
        <img src="{{ asset('storage/' . $curso->imagen) }}" width="100">
    @endif
    <h1>{{$curso->nombre}}</h1>
    <p>{{$curso->descripcion}}</p>
    <p>{{$curso->cupos_disponibles}}</p>
    <p>{{$curso->f_inicio}}</p>
    <p>{{$curso->f_fin}}</p>
    
    @if ($yaInscrito)
        <p>Ya estás inscrito en este curso</p>
    @elseif(!$yaInscrito)
        <form action="{{ route('inscripcion.store') }}" method="POST">
            @csrf
            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
            <button type="submit">Inscribirse</button>
        </form>
    @endif
</body>
</html>