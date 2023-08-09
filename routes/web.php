<?php

use App\Models\Color;
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
    // $color = Color::RED;

    // $user = User::create([
    //     "name"     => "Manuel Henriquez",
    //     "email"    => "manuel@mhenriquez.com",
    //     "password" => bcrypt('12345678')
    // ]);

    // $nuevoColor = ModelsColor::create([
    //     'name' => $color->value
    // ]);

    $color = Color::first();

    return $color->name->colorMatch();
});
