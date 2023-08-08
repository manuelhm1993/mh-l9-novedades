<?php

use App\Models\User;
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
    // return view('welcome');

    /* // -------------- Cambio en los mutadores y accesores
    $name = "Manuel Henriquez";
    $name = "manuel henriquez";
    $name = "MaNuEl HeNrIqUeZ";
    // -------------- Los usuarios pueden ingresar su nombre en cualquier caso

    // -------------- Con los mutadores pasamos todas las entradas a mínuscula o mayúscula para tener congruencia
    $name = "manuel henriquez";

    // -------------- Con los accesores recuperamos la información y la pasamos a capitalize
    $name = "Manuel Henriquez"; */

    // -------------- Simular una captura de registro
    $name     = "MaNuEl HeNrIqUeZ";
    $email    = "manuel@mhenriquez.com";
    $password = bcrypt('12345678') ;

    // -------------- Crear un nuevo usuario
    /* $user = User::create([
        "name"     => $name,
        "email"    => $email,
        "password" => $password
    ]); */

    // -------------- Obtener el usuario registrado
    $user = User::first();

    return $user;
});
