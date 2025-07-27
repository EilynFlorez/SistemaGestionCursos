<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
</head>
<body>
    <main>
        <section class="cont-boton">
            <a href="{{ route('home') }}"><button class="boton">← Volver</button></a>
        </section>
        <section class="contenedor-cont">
            @yield('contenido')
        </section>
    </main>
</body>
</html>