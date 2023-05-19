<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    public function show(){

        if(Auth::check()){
            $clientes = User::all();

            return (view('auth.clientes', compact('clientes')));
        }
        
        return (view('auth.login'));
    }
}
