<?php

use App\CustomClasses\Auto;
use App\Enums\Color;
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

Route::get('/', function () {
    $audi = new Auto();

    // ---------- Se almacena el color en una variable y devolverá un enum con sus propiedades name y value
    $color = Color::RED;

    // ---------- Se accede a la propiedad o el método según se requiera
    $audi->setColor($color->colorMatch());

    return $audi->getColor();
});
