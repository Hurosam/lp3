<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Profesor;
use App\Models\Programa;


class ProfesorController extends Controller
{
    public function mostrar(){
        if (Auth::check()){
        $profesores = Profesor::select('profesors.*','programas.nombre as programa')
        ->join('programas','profesors.id_programa','=','programas.id')
        ->get();
        return view("profesor.ver")
            ->with("profesores", $profesores);
        }else{
            return redirect()->route('login');    
        }
    }

    public function mostrar2(){
        $profesores = Profesor::select('profesors.*','programas.nombre as programa')
        ->join('programas','profesors.id_programa','=','programas.id')
        ->get();
        return response($profesores, 200);
    }

    public function crear(){
        /*if (Auth::check()){
            $programas = Programa::all();
            return view("profesorCrear")->with("programas", $programas);
        }else{
            return redirect()->route('login');    
        }*/
        $programas = Programa::all();

        return view("profesorCrear")->with("programas", $programas);
    }

    public function guardar(Request $request){  
        $request->validate([ //validaciones necesarias
            'dni' => 'required|unique:profesors|integer',
            'nombres' => 'required',
            'apellidos' => 'required',
            'id_programa' => 'required|exists:programas,id',
        ],
    [
        //cambiamos la salida de las valdiaciones a lo que requiramos
        'dni.required' => 'Ingrese su DNI, por favor',
        'dni.integer' => 'El :attribute debe ser NUMERICO',
        'dni.unique' => 'El :attribute ya se encuentra registrado',

    ]); 
        $profesor = new Profesor();
        $profesor ->dni =  $request->input("dni");
        $profesor-> nombres = $request->input("nombres");
        $profesor-> apellidos = $request->input("apellidos");
        $profesor-> id_programa = $request->input("id_programa");
        $profesor->save();
                  /* 
        $dni = $request->input("dni");
        $nombres = $request->input("nombres");
        $apellidos = $request->input("apellidos");
        DB::insert("INSERT INTO profesors(dni, nombres, apellidos) VALUES(?,?,?)", [$dni, $nombres, $apellidos]);
         */

         return redirect('/profesor/mostrar');
    }

    /*public function modificar(int $id){
        $profesor = Profesor::find($id);
        $programas = Programa::all();
        return view("profesorModificar")
        ->with("profesor", $profesor)
        ->with("programas", $programas);

    }*/

    public function modificar(int $id){
        $profesor = Profesor::find($id);
        $programas = Programa::all();

        if (!$profesor) {
            return redirect()->back()->withErrors(['error' => 'Profesor no encontrado']);
        }

        return view("profesorModificar")
        ->with("profesor", $profesor)
        ->with("programas", $programas);
    }


    public function actualizar(Request $request, int $id){

        $profesor = Profesor::find($id);
        $profesor ->dni =  $request->input("dni");
        $profesor-> nombres = $request->input("nombres");
        $profesor-> apellidos = $request->input("apellidos");
        $profesor-> id_programa = $request->input("id_programa");
        $profesor->update();
        return redirect('/profesor/mostrar');        
        /*
        DB::table("profesors")
         ->wehere("dni", $request->input("dni"))
        ->update(["nombres"=>"Ivan"]);
        return "Usuario actualizado";
        */
    }

    public function eliminar(string $id){

        $profesor = Profesor :: find($id);
        $profesor->delete();

        return redirect('/profesor/mostrar');        /*
        DB::delete("DELETE FROM profesors WHERE dni = ?", [$dni]);
        return "registro eliminar";
        */
    }     
}
