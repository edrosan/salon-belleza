<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function show()
    {
        $trabajos = Galeria::all();
        return view('salon.galeria', compact('trabajos'));
    }

    public function get()
    {
        return Galeria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required'
        ]);

        $trabajo = new Galeria();

        $trabajo->imagen = $request->imagen;
        $trabajo->save();

        return redirect()->route('galeria')->with('success', 'Trabajo guardado');
    }

    public function destroy($id)
    {
        $trabajo = Galeria::find($id);
        $trabajo->delete();

        return redirect()->route('galeria')->with('success', 'Trabajo eliminado');
    }
}
