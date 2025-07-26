<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC</title>
</head>
<body>
    <h2>Estudiante</h2>
    <h1>SGC - Sistema de Gestión de Cursos</h1>
    <p>Bienvenid@, {{ Auth::user()->nombres}}</p>
    <a href="{{ route('cursosinscripciones.index') }}">Cursos</a>
    <a href="{{ route('cursosinscritos.index') }}">Mis cursos</a>
    <p><a href="/logout">Cerrar sesión</a></p>
</body>
</html>