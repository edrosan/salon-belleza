<?php

use App\Http\Controllers\RegistrosController;
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
    return view('salon.index');
})->name('inicio');

Route::get('/galeria', function () {
    return view('salon.galeria');
})->name('galeria');

Route::get('/servicios', function () {
    return view('salon.servicios');
})->name('servicios');

Route::get('/productos', function () {
    return view('salon.productos');
})->name('productos');

Route::get('/contacto', function () {
    return view('salon.contacto');
})->name('contacto');

Route::get('/registro', function () {
    return view('salon.registro');
})->name('registro');

Route::post('/registro', [RegistrosController::class, 'store'])->name('registro');

Route::fallback(function () {
    return view('salon.error404');
});