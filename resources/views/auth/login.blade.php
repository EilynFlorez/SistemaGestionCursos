<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <label>Documento o email</label>
        <input type="text" name="documento" required>
        <br>

        <label>Contraseña*</label>
        <input type="password" name="password" required>

        <input type="submit" value="Iniciar sesión">
        <br>
    </form>
    <p>Si no tiene una cuenta <a href="{{ route('registro.form') }}">Registrarse</a></p>
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