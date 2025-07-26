<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>
    <h1>Cursos</h1>
    <a href="{{ route('crearcurso.form') }}">Crear Curso</a>

    <section>
        @foreach ($cursos as $curso)
            <article>
                @if($curso->imagen)
                    <img src="{{ asset('storage/' . $curso->imagen) }}" width="100">
                @endif
                <h1>{{$curso->nombre}}</h1>
                <p>{{$curso->descripcion}}</p>
                <p>{{$curso->cupos_disponibles}}</p>
                <p>{{$curso->f_inicio}}</p>
                <p>{{$curso->f_fin}}</p>
                <a href="{{ route('editarcurso.form', $curso->id) }}">Editar</a>
                <form action="{{ route('eliminarcurso', $curso->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
                </form>

                <a href="{{ route('cursoinscripciones.show', $curso->id) }}">Ver estudiantes inscritos</a>
            </article>
        @endforeach
    </section>
</body>
</html>