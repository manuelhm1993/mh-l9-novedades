<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ---------- Crear una clase para almacenar tipos static
class Color {
    const RED = '#ff0000';
    const GREEN = '#00ff00';
    const BLUE = '#0000ff';
}

// ---------- Crear una clase común con propiedades y métodos POO
class Auto {
    protected $color;

    public function __construct() {
        $this->color = Color::BLUE;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}

Route::get('/', function () {
    $audi = new Auto();

    // ---------- Las constantes son propiedades static de la clase
    $audi->setColor(Color::RED);

    return $audi->getColor();
});
