<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendarController extends Controller
{
    public function index() {
        if(Auth::check()){
            $alias = Auth::user()->alias;

            //* Obtenemos las citas dependiendo si es el admin o un cliente
            if(Auth::user()->alias == 'admin'){
                $citas = Evento::all();
            }else {
                $citas = Evento::where('cliente', $alias)->get();
            }
            $servicios = Servicio::all();

            // dd($citas);
            return (view('auth.agendar',compact('servicios','citas')));
        }
        return view('auth.login');
    }
}
