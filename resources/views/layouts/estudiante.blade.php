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
    <header class="header-estu">
        <div class="header-logo">
            <a href="{{ route('estudiante.paginaprincipal') }}"><img src="{{ asset('images/logo_nombre.png') }}" alt="Logo"></a>
        </div>
        <div class="contenedor-menu">
            <nav class="nav">
                <ul class="menu-estudiante">
                    <li class="link-menu">
                        <img src="{{ asset('images/cursos.png') }}" alt="Curso">
                        <a href="{{ route('cursosinscripciones.index') }}">Cursos</a>
                    </li>
                    <li class="link-menu">
                        <img src="{{ asset('images/miscursos.png') }}" alt="Mis cursos">
                        <a href="{{ route('cursosinscritos.index') }}">Mis cursos</a>
                    </li>
                    <li class="link-menu">
                        <img src="{{ asset('images/cerrarsesion.png') }}" alt="Cerrar sesion">
                        <a href="{{ route('logout') }}">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
            <div class="usuario">
                <p>{{ Auth::user()->nombres }}</p>
                <img src="{{ asset('images/usuario.png') }}" alt="Imagen de usuario">
            </div>
        </div>
        
    </header>

    <main class="content-estudiante">
        @yield('contenido')
    </main>
    
</body>
</html>