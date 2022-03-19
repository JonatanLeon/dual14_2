<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Controlador que gestiona todas las funciones de login y CRUD
 * de los administradores de la aplicación
 */
class AdminController extends Controller
{
    /**
     * Permite a un administrador logearse.
     * Un usuario normal no podría logearse como administrador.
     */
    public function logear(Request $request)
    {
        $nombre = $request->nombre;
        $contrasenia = $request->contrasenia;
        $validado = false;
        if (!is_null($users = Admin::all())) {
            foreach ($users as $user) {
                // Se desencripta la contraseña y se comprueba si es correcta
                if ($nombre == $user->nombre && (password_verify($contrasenia, $user->pass))) {
                    $validado = true;
                }
            }
        } else {
            return 'No hay usuarios registrados';
        }
        if ($validado) return view('menu_admins', compact('nombre'));
        else return view('erroneo');
    }

    /**
     * Muestra todos el usuario seleccionado 
     * con sus contraseña encriptada
     */
    public function index(Request $request)
    {

        $nombre = $request->nombre;
        $validado = false;
        $users = User::all();

        foreach ($users as $user) {
            if ($nombre == $user->nombre) {
                $validado = true;
                $usuario = $user;
            }
        }

        if ($validado) return view('admin_index', compact('usuario'));
        else return view('erroneo');
    }

    /**
     * Permite seleccionar un usuario a modificar y pasarselo
     * a la vista del formulario de modificacion
     */
    public function select(Request $request)
    {
        $nombre = $request->nombre;
        if (!is_null($users = User::all())) {
            foreach ($users as $user) {
                if ($nombre == $user->nombre) {
                    $userMod = $user;
                }
            }
        } else {
            return 'No hay usuarios registrados';
        }
        // Abre la vista del formulario de modificacion, donde se le pasa el nombre del usuario
        if ($userMod != null) return view('menu_modificar', compact('nombre'));
        else return view('erroneo');
    }

    /**
     * A partir de los campos especificados en el formulario de modificacion,
     * actualiza la informacion de un usuario en la base de datos.
     * 
     */
    public function mod(Request $request, $nombre)
    {
        if (strlen($request->password) >= 8) {
            /*
             * Encuentra al usuario al que hay que modificar gracias a que la vista
             * del formulario le pasa, además de los campos del formulario, el nombre
             * del usuario seleccionado en el método anterior
             */
            $user = User::where('nombre', '=', $nombre)->firstOrFail();
            $user->nombre = $request->nombre;
            // La nueva contraseña también se encripta
            $pass_fuerte = password_hash($request->password, PASSWORD_DEFAULT);
            $user->pass = $pass_fuerte;
            $user->save();
            // Se muestran los nuevos datos en la vista correspondiente
            $newName = $user->nombre;
            $newPass = $request->password;
            return view('exito_mod', compact('newName', 'newPass'));
        } else {
            return view('password_corta');
        }
    }
    
    /**
     * Borrar al usuario indicado de la base de datos
     */
    public function borrar(Request $request)
    {
        $user = User::where('nombre', '=', $request->nombre)->firstOrFail();
        $nombre = $user->nombre;
        $user->delete();

        return view('usuario_borrado', compact('nombre'));
    }
}
