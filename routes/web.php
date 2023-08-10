<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\CustomClasses\Acciones;

use App\Enums\Category;
use App\Enums\Color as EnumsColor;

use App\Models\Color;
use App\Models\User;
use App\Models\Post;

use App\Http\Controllers\PostController;

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

Route::get('/redirect', function () {
    // ----------- Forma tradicional de redireccionar a una ruta con nombre
    // return redirect()->route('welcome');

    // ----------- Nuevo helper to_route
    return to_route('welcome2');
});

Route::get('/welcome2', function () {
    return view('welcome2');
})->name('welcom2');

Route::get('/helpers', function () {
    $nombre = "Manuel";

    // ----------- Nuevo helper str, permite muchas funciones como agregar texto a una cadena
    $nombre = str($nombre)->append(' Henriquez');

    // ----------- Crear un slug con el separador '-'
    $slug = str()->slug($nombre);

    // ----------- Crear un slug con el separador '_'
    $snake = str($nombre)->slug('_');

    return [$nombre, $slug, $snake];
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

// --------------- Ruta POST para procesar el formulario
Route::post('/procesar', function (Request $request) {
    // --------------- Validando el formulario
    $request->validate([
        'name'        => 'required',
        'description' => 'required',
        'fruits'      => 'required',
        'active'      => 'required',
        'country'     => 'required',
    ]);

    return $request->all();

})->name('procesar');

// --------------- scopeBindings verifica si el post le pertenece al usuario, en caso contrario retorna 404
// --------------- Para que funcione se deben definir las relaciones en los modelos y se puede aplicar a un grupo
Route::scopeBindings()->group(function () {
    Route::get('/users/{user}/posts/{post}', function (User $user, Post $post) {
        return [$user, $post];
    });
});

// --------------- Solo registrar los métodos index y show del controlador de recursos
/*Route::resource('posts', PostController::class)->only([
    'index', 'show'
]);*/

// --------------- Registrar las rutas del controlador individualmente
/* Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); */

// --------------- Laravel 9 como novedad permite agrupar las rutas de un controlador
Route::controller(PostController::class)->name('posts.')->group(function () {
    Route::get('/posts', 'index')->name('index');
    Route::get('/posts/{post}', 'show')->name('show');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
