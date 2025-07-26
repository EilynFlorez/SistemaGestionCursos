<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
</head>
<body>
    <h1>Crear Curso</h1>
    <form action="{{ route('editarcurso.store', $id->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{$id->nombre}}">
        <br>

        <label>Descripción:</label>
        <textarea name="descripcion">{{$id->descripcion}}</textarea>
        <br>

        @if($id->imagen)
            <p>Imagen actual:</p>
            <img src="{{ asset('storage/' . $id->imagen) }}" width="100"><br>
        @endif
        <label>Imagen:</label>
        <input type="file" name="imagen" accept=".jpg,.jpeg,.png">
        <br>

        <label>Cupos disponibles:</label>
        <input type="number" name="cupos_disponibles" value="{{$id->cupos_disponibles}}">
        <br>

        <label>Fecha de inicio:</label>
        <input type="date" name="f_inicio" value="{{$id->f_inicio}}">
        <br>

        <label>Fecha de fin:</label>
        <input type="date" name="f_fin" value="{{$id->f_fin}}">

        <input type="submit" value="Editar">
        <br>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>