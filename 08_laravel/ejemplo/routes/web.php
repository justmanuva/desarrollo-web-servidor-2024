<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\MarcaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Si ponemos esta ruta en el localhost:8000 accedemos a las vistas estas
//Tenemos que crear los ficheros php en resources/views
Route::get('/coches', [CocheController::class, 'index']);

//Con esto hacemos referencia a todos los mensajes aparte del GET
Route::resource('/marcas', MarcaController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});
