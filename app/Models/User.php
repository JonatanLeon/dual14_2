<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo que representa un usuario registrado en la base de  datos
 * con sus propiedades nombre y contraseña
 * 
 * Eloquent detecta que existe una tabla para este modelo y le aplica
 * automaticamente sus mismas propiedades
 */
class User extends Model
{
    use HasFactory;
}
