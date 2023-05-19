<?php

namespace App\Http\Controllers;

use App\Mail\EnviarCorreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('salon.contacto');
    }

    public function send(Request $request){
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'comentarios' => 'required',
        ]);

        Mail::to('edo.rod.san@gmail.com')->send(new EnviarCorreo($request));
        return redirect()->route('contacto')->with('success', 'Correo enviado');
    }
}
