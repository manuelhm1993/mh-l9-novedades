<?php

namespace App\Enums;

// ---------- Crear tipos enum, se define el nombre y el tipo: enum Nombre: tipo {}
enum Color: string {
    // ---------- Propiedades
    case RED = '#ff0000';
    case GREEN = '#00ff00';
    case BLUE = '#0000ff';

    // ---------- Métodos
    public function color(): string {
        return $this->value;// ---------- Se devuelve el valor con $this
    }

    public function colorMatch(): string {
        return match($this) {
            Color::RED   => 'Rojo',
            Color::GREEN => 'Verde',
            Color::BLUE  => 'Azul',
        };// ---------- Se devuelve el correspondiente al caso, es similar al switch
    }
}