<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show(){

        if(Auth::check()){
            $citasController = new CitasController;
            $semana = $citasController->getWeek();
            $mes = $citasController->getMonth();
            $year = $citasController->getYear();

            $ServicioController = new ServicioController;
            $serviciosOriginal = $ServicioController->getServiciosOriginal();
            $servicios = $ServicioController->get();

            return (view('auth.perfil', compact('semana', 'mes', 'year', 'servicios', 'serviciosOriginal')));
        }
        
        return (view('auth.login'));
    }
}
