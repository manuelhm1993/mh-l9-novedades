<?php

use Illuminate\Support\Facades\Route;

use App\CustomClasses\Acciones;

use App\Models\Color;
use App\Enums\Category;
use App\Enums\Color as EnumsColor;
use App\Models\Post;
use App\Models\User;

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

// ------------------- Crea un usuario y un color
Route::get('/actions', function () {
    $user  = Acciones::nuevoUsuario("Manuel Henriquez", "manuel@mhenriquez.com", "12345678");
    $color = Acciones::nuevoColor(EnumsColor::RED);

    return [$user, $color];
});

// ------------------- Obtiene el color, lo castea a Enum y se obtiene su valor en texto y no en hexadecimal
Route::get('/color', function () {
    $color = Color::first();

    return $color->name->colorMatch();
});

// --------------- Restringir el tipo de datos enviados por la URL
Route::get('/category/{category}', function (Category $category) {
    return $category->value;
});

// --------------- scopeBindings verifica si el post le pertenece al usuario, en caso contrario retorna 404
/* Route::get('/users/{user}/posts/{post}', function (User $user, Post $post) {
    return [$user, $post];
})->scopeBindings(); */

// --------------- Para que funcione se deben definir las relaciones en los modelos y se puede aplicar a un grupo
Route::scopeBindings()->group(function () {
    Route::get('/users/{user}/posts/{post}', function (User $user, Post $post) {
        return [$user, $post];
    });
});
