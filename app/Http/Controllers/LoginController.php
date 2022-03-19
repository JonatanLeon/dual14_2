<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Clase controlador que contiene la logica para que un usuario registrado
 * pueda acceder a la pagina con sus credenciales
 */
class LoginController extends Controller
{
    public function logear(Request $request)
    {
        // Se obtienen las credenciales del formulario
        $nombre = $request->nombre;
        $contrasenia = $request->contrasenia;
        $validado = false;
        // Comprobamos si el usuario existe en la base de datos y la contraseña es correcta
        if (!is_null($users = User::all())) {
            foreach ($users as $user) {
                if ($nombre == $user->nombre && (password_verify($contrasenia, $user->pass))) {
                    $validado = true;
                }
            }
            // En caso de que no haya ningun usuario registrario saldra este mensaje de error
        } else {
            return 'No hay usuarios registrados';
        }
        // Dependiendo de si la contraseña o el usuario son correctos devolvera una vista u otra
        if ($validado) return view('acceso', compact('nombre'));
        else return view('erroneo');
    }
}
