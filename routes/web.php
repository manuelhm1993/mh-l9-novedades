<?php

use Illuminate\Support\Facades\Route;

use App\CustomClasses\Acciones;

use App\Models\Color;
use App\Enums\Category;
use App\Enums\Color as EnumsColor;

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
    return view('welcome');
});

Route::get('/actions', function () {
    $user  = Acciones::nuevoUsuario("Manuel Henriquez", "manuel@mhenriquez.com", "12345678");
    $color = Acciones::nuevoColor(EnumsColor::RED);

    return [$user, $color];
});


Route::get('/color', function () {
    $color = Color::first();

    return $color->name->colorMatch();
});

// --------------- Restringir el tipo de datos enviados por la URL
Route::get('category/{category}', function (Category $category) {
    return $category->value;
});