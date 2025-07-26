<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
</head>
<body>
    <h1>Crear Curso</h1>
    <form action="{{ route('crearcurso.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>

        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <br>

        <label>Imagen:</label>
        <input type="file" name="imagen" accept=".jpg,.jpeg,.png" required>
        <br>

        <label>Cupos disponibles:</label>
        <input type="number" name="cupos_disponibles" required>
        <br>

        <label>Fecha de inicio:</label>
        <input type="date" name="f_inicio" required>
        <br>

        <label>Fecha de fin:</label>
        <input type="date" name="f_fin" required>

        <input type="submit" value="crear">
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