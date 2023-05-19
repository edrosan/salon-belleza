<?php

use App\Http\Controllers\AgendarController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ProductoController;
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

// ! Inicio
Route::get('/', function () {
    return view('salon.index');
})->name('inicio');


// ! Nosotros

Route::get('/nosotros', function () {
    return view('salon.nosotros');
})->name('nosotros');

// * Galeria
Route::get('/galeria', [GaleriaController::class, 'show'])->name('galeria');
Route::post('/galeria', [GaleriaController::class, 'store'])->name('galeria');

Route::delete('/galeria/{id}', [GaleriaController::class, 'destroy'])->name('galeria-destroy');

// * Servicios
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios');
Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios');

Route::get('/servicios/{id}', [ServicioController::class, 'show'])->name('servicios-edit');
Route::patch('/servicios/{id}', [ServicioController::class, 'update'])->name('servicios-update');
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->name('servicios-destroy');

Route::get('/get/servicios', [ServicioController::class, 'get'])->name('servicios-get');

// * Productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos');

Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos-show');
Route::patch('/productos/{id}', [ProductoController::class, 'update'])->name('productos-update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos-destroy');

// ! Contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'send'])->name('contacto');


//* Citas
Route::get('/citas', [CitasController::class, 'show'])->name('citas');
Route::get('/citas/get', [EventoController::class, 'show'])->name('get-eventos');
Route::get('/citas/get/time/{fecha}', [EventoController::class, 'getTime'])->name('get-time');
Route::get('/citas/get/{fecha}', [EventoController::class, 'get'])->name('get-citas-fecha');

Route::post('/citas/set', [EventoController::class, 'store'])->name('set-cita');

Route::delete('/citas/{id}', [CitasController::class, 'destroy'])->name('delete-citas');
Route::get('/citas/week', [CitasController::class, 'getWeek'])->name('week-citas');

Route::get('/citas/frecuencia', [CitasController::class, 'getFrecuencia'])->name('get-frecuencia');

//! Agendar
Route::get('/agendar', [AgendarController::class, 'index'])->name('agendar');


//! Clientes
Route::get('/clientes', [ClientesController::class, 'show'])->name('clientes');

// ! Perfil
Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil');


// ! Registro
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// ! Inicio sesion
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ! Salir
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


// ! Error 404 
Route::fallback(function () {
    return view('salon.error404');
});
