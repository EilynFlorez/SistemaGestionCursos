<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registrarse</h1>
    <form action="{{ route('registro.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id_rol" value="1" >
        <label>Tipo de documento*</label>
        <select name="tipo_documento" required>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="CE">Cédula de Extranjería</option>
            <option value="PEP">Permiso Especial de Permanencia</option>
            <option value="PPT">Permiso por Protección temporal</option>
        </select>
        <br>

        <label>Documento*</label>
        <input type="text" name="documento" required>
        <br>

        <label>Nombres*</label>
        <input type="text" name="nombres" required>
        <br>

        <label>Primer apellido*</label>
        <input type="text" name="papellido" required>
        <br>

        <label>Segundo apellido*</label>
        <input type="text" name="sapellido" required>
        <br>

        <label>Edad*</label>
        <input type="number" name="edad" required>
        <br>

        <label>Genero*</label>
        <select name="genero" required>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
            <option value="otro">Otro</option>
        </select>
        <br>

        <label>Correo electrónico*</label>
        <input type="email" name="email" required>
        <br>

        <label>Contraseña*</label>
        <input type="password" name="password" required>
        <br>

        <label>Confirmar contraseña*</label>
        <input type="password" name="password_confirmacion" required>
        <br>

        <input type="submit" value="Registrarse">

    </form>

    <p>Si ya tiene una cuenta <a href="{{ route('login') }}">Inicie sesión</a></p>

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