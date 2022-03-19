<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
/**
 * Clase controlador que implementa la logica para que un usuario
 * pueda registrarse en la base de datos y poder acceder con sus
 * credenciales en la pantalla de login
 */
class RegisterController extends Controller
{
    public function registrar(Request $request)
    {   
        // Recogemos los campos del formulario
        $nombre = $request->regNombre;
        $contrasenia = $request->regContrasenia;
        $repeContrasenia = $request->repeContrasenia;
        $registrado = false;
        // Se comprueba si el usuario existe ya en la base de datos
        if (!is_null($users = User::all())) {
            foreach ($users as $user) {
                if ($nombre == $user->nombre) {
                    $registrado = true;
                }
            }
        }
        // Si existe se comunicara al usuario
        if ($registrado) return view('ya_registrado');
        // Si no, se comprueba que la contraseña repetida coincida
        else {
            if ($contrasenia != $repeContrasenia) return view('error_password');
            else if (strlen($contrasenia)<8) return view ('password_corta');
            else {
                // Y si coinciden se registrara al usuario en la base de  datos
                $user = new User();
                $user->nombre = $nombre;
                $user->pass = $contrasenia;
                $pass_fuerte = password_hash($contrasenia, PASSWORD_DEFAULT);
                $user->pass = $pass_fuerte;
                $user->save();
                return view('registrado_correctamente', compact('nombre'));
            }
        }
    }
}
