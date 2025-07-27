@extends('layouts.admin')
@section('titulo', 'Detalles del curso')

@section('contenido')
    <div class="conten-curso">
        <div class="contenido-curso">
           <div>
                @if($curso->imagen)
                    <img src="{{ asset('storage/' . $curso->imagen) }}" width="250">
                @endif
            </div>
            <div class="texto-curso">
                <h2>{{$curso->nombre}}</h2>
                <p>{{$curso->descripcion}}</p>
                <p>Cupos disponible: {{$curso->cupos_disponibles}}</p>
                <p>Fecha de inicio: {{$curso->f_inicio}}</p>
                <p>fecha de finalización: {{$curso->f_fin}}</p>
            </div> 
        </div>
        
        <div class="botones-curso">
            <a href="{{ route('editarcurso.form', $curso->id) }}"><button class="boton">Editar</button></a>
            <form action="{{ route('eliminarcurso', $curso->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="boton" onclick="return confirm('¿Está seguro de qué desea eliminar este curso?')">Eliminar</button>
            </form>
        </div>
    </div>
    <div class="tabla">
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
                        @if($estudiante->genero === "F")
                        <td>Femenino</td>
                        @elseif($estudiante->genero === "M")
                        <td>Masculino</td>
                        @elseif($estudiante->genero === "otro")
                        <td>Otro</td>
                        @endif
                        
                        <td>{{ $estudiante->email }}</td>
                        <td>{{ $estudiante->pivot->fecha_hora }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
@endsection