<?php

namespace App\CustomClasses;

use App\Enums\Color as EnumsColor;
use App\Models\Color;
use App\Models\User;

class Acciones {
    /**
     * Crea un nuevo usuario y retorna el registro
     */
    public static function nuevoUsuario($nombre, $email, $clave) {
        $user = User::create([
            "name"     => $nombre,
            "email"    => $email,
            "password" => bcrypt($clave)
        ]);

        return $user;
    }

    /**
     * Crea un nuevo color y retorna el registro
     */
    public static function nuevoColor(EnumsColor $enumColor) {
        $color = Color::create([
            'name' => $enumColor->value
        ]);

        return $color;
    }
}