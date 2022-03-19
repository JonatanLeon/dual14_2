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

// Pagina con el formulario de registro
Route::get('/registro', function () {
    return view('registro');
});

// Pagina de logeo justo despues de ser registrado, misma vista que en /acceso
Route::post('/registro/registrado', [RegisterController::class, 'registrar']);

// Ruta que lista todos los nombres de los usuarios registrados
Route::get('/index', [ListadoController::class, 'index']);

// Lleva a la pantalla de login de los administradores
Route::get('/adminlogin', function () {
    return view('login_admins');
});

// Al logearse, el admin accede a su panel de control
Route::post('/menuadmins', [AdminController::class, 'logear']);

// Devuelve la vista para que el admin busque a un usuario
Route::get('/buscarusuario', function () {
    return view('admin_buscar');
});

// Devuelve los datos del usuario buscado por el admin
Route::post('/buscarusuario/datosusuario', [AdminController::class, 'index']);

// Va a la vista que permite seleccionar el usuario al que modificar
Route::get('/modificarusuario', function () {
    return view('selec_usuario_mod');
});

// Una vez seleccionado, lleva al formulario de modificación de dicho usuario
Route::post('/modificarusuario/mod', [AdminController::class, 'select']);

// Al introducir los nuevos datos, nos dirige a la vista en la que se muestran los nuevos datos modificados
// Nótese que en la ruta se le pasa una variable nombre para que el controlador identifique el usuario al que modificar
Route::post('/modificarusuario/mod/{nombre}/exito', [AdminController::class, 'mod'])->name('usuario.mod');

// Lleva a la vista de seleccionar el usuario que queramos borrar
Route::get('/borrarusuario', function () {
    return view('borrar_usuario');
});

// Una vez borrado, nos lleva a la vista que confirma la eliminación
Route::post('/borrarusuario/borrado', [AdminController::class, 'borrar']);
