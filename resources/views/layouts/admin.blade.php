<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
</head>
<body class="body-admin">
    <header class="header-admin">
        <div class="logo">
            <img src="{{ asset('images/logo_nombre.png') }}" alt="Logo">
        </div>
        <nav>
            <ul class="menu-admin">
                <li class="link-menu">
                    <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="link-menu">
                    <img src="{{ asset('images/cursos.png') }}" alt="Curso">
                    <a href="{{ route('cursos.index') }}">Cursos</a>
                </li>
                <li class="link-menu">
                    <img src="{{ asset('images/cerrarsesion.png') }}" alt="Cerrar sesión">
                    <a href="{{ route('logout') }}">Cerrar sesión</a>
                </li>
            </ul>
        </nav>
        
    </header>
    <main class="main-admin">
        <section class="titulo">
            <div class="nombre">
                <h2>@yield('titulo')</h2>
            </div>
            
            <div class="usuario">
                <p>{{ Auth::user()->nombres }}</p>
                <img src="{{ asset('images/usuario.png') }}" alt="Imagen de usuario">
            </div>
        </section>
        <section class="contenido">
            @yield('contenido')
        </section>
    </main>
</body>
</html>