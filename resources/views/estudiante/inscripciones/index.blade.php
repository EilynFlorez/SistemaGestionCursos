<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis inscripciones</title>
</head>
<body>
    <h1>Mis cursos</h1>
     @if ($cursos->isEmpty())
        <p>No estás inscrito en ningún curso.</p>
    @else
        <ul>
            @foreach ($cursos as $curso)
                <li>
                    @if($curso->imagen)
                        <img src="{{ asset('storage/' . $curso->imagen) }}" width="100">
                    @endif
                    <p>{{ $curso->nombre }}</p>
                    <p>{{ $curso->descripcion }}</p>
                    <p>Fecha inicio: {{ $curso->f_inicio }}</p>
                    <p>Fecha fin: {{ $curso->f_fin }}</p>
                    <p>Fecha de la inscripcion : {{ $curso->pivot->fecha_hora }}</p>
                </li>
            @endforeach
        </ul>
    @endif
    
</body>
</html>