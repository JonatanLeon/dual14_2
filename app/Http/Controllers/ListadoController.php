<?php

namespace App\Http\Controllers;

use App\Models\User;

/**
 * Clase del controlador que mostrará todos los usuarios
 * en una vista
 */
class ListadoController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('index', compact('usuarios'));
    }
}
