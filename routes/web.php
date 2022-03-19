<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ListadoController;

// Aqui se indican las rutas que tendra nuestra pagina
// Asi como los controladores y vistas que entraran en accion segun la ruta

// Pagina principal, el home o portada, con el formulario de login
Route::get('/', function () {
    return view('portada');
});

// Ruta a la que se accede al logearnos
Route::post('/acceso', [LoginController::class, 'logear']);

Route::get('/adminlogin', function () {
    return view('login_admins');
});

Route::post('/menuadmins', [AdminController::class, 'logear']);

// Pagina con el formulario de registro
Route::get('/registro', function () {
    return view('registro');
});

// Pagina de logeo justo despues de ser registrado, misma vista que en /acceso
Route::post('/registro/registrado', [RegisterController::class, 'registrar']);

Route::get('/index', [ListadoController::class, 'index']);

Route::get('/buscarusuario', function () {
    return view('admin_buscar');
});

Route::post('/buscarusuario/datosusuario', [AdminController::class, 'index']);

Route::get('/modificarusuario', function () {
    return view('selec_usuario_mod');
});

Route::post('/modificarusuario/mod', [AdminController::class, 'select']);

Route::post('/modificarusuario/mod/{nombre}/exito', [AdminController::class, 'mod'])->name('usuario.mod');

Route::get('/borrarusuario', function () {
    return view('borrar_usuario');
});

Route::post('/borrarusuario/borrado', [AdminController::class, 'borrar']);
