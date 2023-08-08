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

// ---------- Crear tipos enum, se define el nombre y el tipo: enum Nombre: tipo {}
enum Color: string {
    case RED = '#ff0000';
    case GREEN = '#00ff00';
    case BLUE = '#0000ff';
}

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

Route::get('/', function () {
    $audi = new Auto();

    // ---------- Se almacena el color en una variable y devolverá un enum con sus propiedades name y value
    $color = Color::RED;

    // ---------- Se accede a la propiedad value y se obtiene el mismo resultado
    $audi->setColor($color->value);

    return $audi->getColor();
});
