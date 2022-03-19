<?php

namespace App\Http\Controllers;

use App\Models\User;

class ListadoController extends Controller
{
    public function index() {
        $usuarios = User::all();
        return view('index', compact('usuarios'));
    }
}
