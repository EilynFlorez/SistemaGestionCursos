<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC - Dashboard</title>
</head>
<body>
    <h2>Administrador</h2>
    <h1>SGC - Sistema de Gestión de Cursos</h1>
    <p>Bienvenid@, {{ Auth::user()->nombres}}</p>
    <p><a href="/logout">Cerrar sesión</a></p>
</body>
</html>