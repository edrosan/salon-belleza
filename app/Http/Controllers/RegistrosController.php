<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistrosController extends Controller
{
    
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|min:3'
        ]);

        $registro = new Registro;

        $registro->NOMBRE = $request->nombre;
        $registro->save();

        return redirect()->route('registro')->with('success', 'Registro creado');
    }
}
