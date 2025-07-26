<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso</title>
</head>
<body>
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

    <h2>Estudiantes inscriptos</h2><br>

    @if($curso->estudiantes->isEmpty())
        <p>No hay estudiantes inscritos en este curso</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de documento</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Género</th>
                    <th>Correo</th>
                    <th>Fecha de incripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($curso->estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    @if($estudiante->tipo_documento === "TI")
                    <td>Tarjeta de identidad</td>
                    @elseif($estudiante->documento === "CC")
                    <td>Cedula de ciudadania</td>
                    @elseif($estudiante->documento === "CE")
                    <td>Cedula de extranjeria</td>
                    @elseif($estudiante->documento === "PEP")
                    <td>Permiso especial de permanencia</td>
                    @elseif($estudiante->documento === "PPT")
                    <td>Permiso por proteccion temporal</td>
                    @endif
                    <td>{{ $estudiante->documento }}</td>
                    <td>{{ $estudiante->nombres }}</td>
                    <td>{{ $estudiante->papellido }} {{ $estudiante->sapellido }}</td>
                    <td>{{ $estudiante->edad }}</td>
                    <td>{{ $estudiante->genero === "F" ? "Femenino" : "Masculino" }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $estudiante->pivot->fecha_hora }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>