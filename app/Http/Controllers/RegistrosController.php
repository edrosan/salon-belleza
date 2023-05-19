<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistrosController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3'
        ]);

        $registro = new Registro;

        $registro->nombre = $request->nombre;
        $registro->apellido = $request->apellido;
        $registro->alias = $request->alias;
        $registro->calle = $request->calle;
        $registro->numero = $request->numero;
        $registro->colonia = $request->colonia;
        $registro->cp = $request->cp;
        $registro->celular = $request->celular;
        $registro->local = $request->local;
        $registro->correo = $request->correo;
        $registro->password = $request->password;
        $registro->save();

        return redirect()->route('registro')->with('success', 'Registro creado');
    }

    public function register(){}
}
