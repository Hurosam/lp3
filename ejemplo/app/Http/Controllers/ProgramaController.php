<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programa = new Programa( );
         return response ($programa->all(),200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $respuesta ="";
        $nombre = $request->input('nombre');
    
        if($nombre!=""){
            $programa = new Programa( );
            $programa->nombre = $nombre;
            $programa->save();
            $respuesta = json_encode(array("mensaje"=>"Programa creado"));
            return response ($respuesta,200);
        }else{
            $respuesta = json_encode(array("mensaje"=>"No pudo Crear"));
            return response ($respuesta,400);
        }
        
    }

    public function show(string $id)
    {
        $programa = Programa :: where("id",$id)->first();
        return response ($programa,200);
    }

    public function update(Request $request, string $id)
    {
        $programa = Programa ::find($id);
        $programa->nombre = $request->input('nombre');
        $programa->save();
        $respuesta = json_encode(array("mensaje"=>"Programa actualizado"));
        return response ($respuesta,200);   
    }

        public function destroy(string $id)
    {
        $programa = Programa ::find($id);
        $programa->delete();
        $respuesta = json_encode(array("mensaje"=>"Programa eliminado"));
        return response ($respuesta,200);
    }
}
