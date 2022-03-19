<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function logear(Request $request)
    {
        $nombre = $request->nombre;
        $contrasenia = $request->contrasenia;
        $validado = false;
        if (!is_null($users = Admin::all())) {
            foreach ($users as $user) {
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
        if ($userMod!=null) return view('menu_modificar', compact('nombre'));
        else return view('erroneo');
    }

    public function mod(Request $request, $nombre)
    {   
        if (strlen($request->password)>=8) {
            $user = User::where('nombre', '=', $nombre)->firstOrFail();
            $user->nombre = $request->nombre;
            $pass_fuerte = password_hash($request->password, PASSWORD_DEFAULT);
            $user->pass = $pass_fuerte;
            $user->save();
            $newName = $user->nombre;
            $newPass = $request->password;
            return view('exito_mod', compact('newName', 'newPass'));
        } else {
            return view('password_corta');
        }
    }

    public function borrar(Request $request)
    {   
        $user = User::where('nombre', '=', $request->nombre)->firstOrFail();
        $nombre = $user->nombre;
        $user->delete();

        return view('usuario_borrado', compact('nombre'));
    }
}
