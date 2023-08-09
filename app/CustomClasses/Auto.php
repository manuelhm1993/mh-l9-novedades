<?php

namespace App\CustomClasses;

use App\Enums\Color;

// ---------- Crear una clase común con propiedades y métodos POO
class Auto {
    protected $color;

    public function __construct() {
        // ---------- Los tipo enum son objetos con las propiedades name y value
        $this->color = Color::BLUE->value;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}