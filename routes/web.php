<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\VolverController;
//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//Registro
Route::get('/registro', [RegistroController::class, 'create'])->name('registro.form');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');

//Login
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

//Logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Routes de Administrador
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admin.dashboard');
    //Curso
    Route::get('/admin/cursos', [CursosController::class, 'index'])->name('cursos.index');
    Route::get('/admin/cursos/{id}', [CursosController::class, 'show'])->name('cursoinscripciones.show');

    Route::get('/admin/curso/create', [CursosController::class, 'create'])->name('crearcurso.form');
    Route::post('/admin/curso/create', [CursosController::class, 'store'])->name('crearcurso.store');

    Route::get('/admin/curso/editar/{curso}', [CursosController::class, 'edit'])->name('editarcurso.form');
    Route::put('/admin/curso/editar/{curso}', [CursosController::class, 'update'])->name('editarcurso.store');

    Route::delete('admin/curso/eliminar/{curso}', [CursosController::class, 'destroy'])->name('eliminarcurso');
});

//Routes de Estudiante
Route::middleware(['auth', 'estudiante'])->group(function () {
    Route::get('/estudiante/paginaprincipal', [EstudianteController::class, 'show'])->name('estudiante.paginaprincipal');

    Route::get('/estudiante/cursos', [CursosController::class, 'indexE'])->name('cursosinscripciones.index');
    Route::get('/estudiante/cursos/{id}', [CursosController::class, 'showE'])->name('curso.showE');

    Route::post('/estudiante/inscripcion', [InscripcionController::class, 'store'])->name('inscripcion.store');
    Route::get('/estudiente/cursosinscritos', [InscripcionController::class, 'index'])->name('cursosinscritos.index');
});