<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;

//Home
Route::get('/', [HomeController::class, 'show'])->name('home');

//Registro
Route::get('/registro', [RegistroController::class, 'show'])->name('registro.form');
Route::post('/registro', [RegistroController::class, 'registro'])->name('registro.store');

//Login
Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

//Logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Routes de Administrador
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admin.dashboard');
});

//Routes de Estudiante
Route::middleware(['auth', 'estudiante'])->group(function () {
    Route::get('/estudiante/paginaprincipal', [AdminController::class, 'show'])->name('estudiante.paginaprincipal');
});