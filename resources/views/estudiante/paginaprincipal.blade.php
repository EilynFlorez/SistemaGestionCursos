@extends('layouts.estudiante')
@section('contenido')
    <section class="inicio">
        <div class="imagen-fondo">
        </div>
        <div class="texto-inicio">
            <h1>Inscribete a los cursos que más deseas</h1>
            <p>Consulta los cursos disponibles y regístrate con un solo clic. Aprovecha esta oportunidad de seguir creciendo.</p>
            <a href="{{ route('cursosinscripciones.index') }}"><button class="boton-2">Ver Cursos →</button></a>
        </div>
    </section>
    <section class="cont-compl">
        <div class="texto-compl">
            <h2>¿Qué es el Sistema de Gestión de Cursos?</h2>
            <p>Es el espacio en donde encontrarás toda la información necesaria para conocer los cursos disponibles. Podrás revisar la información general de cada curso y, si te interesa, inscribirte fácilmente con un solo clic. Además, podrás consultar en cualquier momento en qué cursos ya estás inscrito</p>
        </div>
        <div class="imagen-compl">
            <img src="{{ asset('images/imagen-fondo2.png') }}" alt="Imagen">
        </div>
    </section>
    <footer>
        <p>&copy; Sistema de Gestión de Cursos</p>
        <p>Desarrollado por Eilyn Giannella Florez Gañan</p>
    </footer>
@endsection