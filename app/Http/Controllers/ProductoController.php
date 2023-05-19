<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        
        return view('salon.productos', compact('productos'));
    }

    public function show($id){
        $producto = Producto::find($id);

        return view('salon.producto', compact('producto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'imagen' => 'required',
        ]);

        $producto = new Producto();

        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;
        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto creado');
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->imagen = $request->imagen;
        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto actualizado');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->route('productos')->with('success', 'Producto eliminado');
    }
}
