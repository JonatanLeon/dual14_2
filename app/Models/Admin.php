<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo que representa a un rol de administrador
 * en la base de datos. Los adminsitradores tienen
 * privilegios y posibilidades que los usuarios normales
 * no tienen
 */
class Admin extends Model
{
    use HasFactory;
}
