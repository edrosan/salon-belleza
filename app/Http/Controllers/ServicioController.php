<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    /**
     * index para mostrar todo
     * store para guarddar
     * update para actualizar
     * destroy para eliminar
     * edit para mostrar el formulario de edicion
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);
        return view('salon.servicio', compact('servicio'));
    }

    public function index()
    {
        $servicios = Servicio::all();
        return view('salon.servicios', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicio' => 'required',
            'duracion' => 'required',
            'precio' => 'required',
            'imagen' => 'required',
        ]);

        $servicio = new Servicio();

        $servicio->servicio = $request->servicio;
        $servicio->duracion = $request->duracion;
        $servicio->precio = $request->precio;
        $servicio->imagen = $request->imagen;
        $servicio->save();

        return redirect()->route('servicios')->with('success', 'Servicio creado');
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->servicio = $request->servicio;
        $servicio->duracion = $request->duracion;
        $servicio->precio = $request->precio;
        $servicio->imagen = $request->imagen;
        $servicio->save();

        return redirect()->route('servicios')->with('success', 'Servicio actualizado');
    }

    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();

        return redirect()->route('servicios')->with('success', 'Servicio eliminado');
    }

    public function get()
    {
        $CitasController = new CitasController();
        $descuento = $CitasController->getFrecuencia();

        $servicios = Servicio::all();
        foreach ($servicios as $servicio) {
            $servicio->precio = ($servicio->precio - ($servicio->precio * $descuento));
        }
        return ($servicios);
    }

    public function getServiciosOriginal()
    {
        $servicios = Servicio::all();
        return ($servicios);
    }
}
