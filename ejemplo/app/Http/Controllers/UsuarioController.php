<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function mostrarNombre(string $nombre)
    {
        return view('prueba')
            ->with('nombre', $nombre)  // Ensure this matches the variable name used in the view
            ->with('edad', 21);        // Passing 'edad' as well
    }

    function registrar(Request $request){
        return $request->input("nombre");
    }
}
