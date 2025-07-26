<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cursos disponibles</h1>
    <section>
        @foreach ($cursos as $curso)
        
            @if($curso->cupos_disponibles > 0 && !($curso->fecha_inicio->lt(today())))
            <article>
                @if($curso->imagen)
                    <img src="{{ asset('storage/' . $curso->imagen) }}" width="100">
                @endif
                <p>Nombre: {{ $curso->nombre }}</p>
                <p>Descripcion: {{ $curso->descripcion }}</p>
                <a href="{{ route('curso.showE', $curso->id) }}">Ver más</a>

            </article>
            @endif
        @endforeach
    </section>
</body>
</html>