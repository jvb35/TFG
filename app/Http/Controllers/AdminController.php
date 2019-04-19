<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use Illuminate\Support\Facades\Redirect;
use App\Persona;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private $mascotas;
    private $personas; 

    function login(){
        return view('login');
    }

    function elegir_mascota(){
        return view('elegir-mascota');
    }

    function admin_menu(){
        return view('panel-admin');
    }

    function ver_mascotas(){
        $mascotas = DB::table('mascotas')->paginate(10);
        return view('ver_mascotas', ['mascotas' => $mascotas]);
    }

    function ver_personas(){
        $personas = DB::table('personas')->paginate(10);
        return view('ver_personas', ['personas' => $personas]);
    }

    function showPerson(){
        return view('añadir-persona');
    }

    function deletePersona($id=null){
        $persona = Persona::find($id);
        $mascotas = \App\Mascota::get();
        foreach ($mascotas as $mascota){
            if($mascota->persona_id == $id){
                $mascota->delete();
            }
        }
        $persona->delete();

        return Redirect::to('/admin-menu/personas/ver');
    }

    function deleteMascota($id=null){
        $mascota = Mascota::find($id);
        $mascota->delete();

        return Redirect::to('/admin-menu/mascotas/ver');
    }

    function showMascota(){
        $personas = \App\Persona::get();
        return view('añadir_mascota', ['personas' => $personas]);
    }

    function saveMascota(Request $request){
        if($_POST)
        {
            $originalDate = $request->input('fecha_nac');
            $newDate = date("Y/m/d", strtotime($originalDate));
            Mascota::where('nombre', '=', $request->input('nombre'))->update(
                array(
                    'chip' => $request->input('chip'),
                    'nombre' => $request->input('nombre'),
                    'fecha_nac' => $newDate,
                    'raza' => $request->input('raza'),
                    'especie' => $request->input('especie'),
                    'num_pasaporte' => $request->input('num_pasaporte'),
                    'peso' => $request->input('peso'),
                    'propietario' => $request->input('propietario')
                )
            );
        }

        return Redirect::to('/admin-menu/mascotas/ver');

    }

    function addMascota(Request $request){
        $originalDate = $request->input('fecha_nac');
        $newDate = date("Y/m/d", strtotime($originalDate));

        $mascota = new Mascota;
        $mascota->chip = $request->input('chip');
        $mascota->nombre = $request->input('nombre');
        $mascota->fecha_nac = $newDate;
        $mascota->raza = $request->input('raza');
        $mascota->especie = $request->input('especie');
        $mascota->num_pasaporte = $request->input('num_pasaporte');
        $mascota->sexo = "M";
        $mascota->peso = $request->input('peso');
        $mascota->propietario = $request->input('propietario');
        $personas = \App\Persona::get();
        foreach ($personas as $persona){
            if($persona->nombre == $mascota->propietario){
                $mascota->persona_id = $persona->id;
            }
        }
        
        $mascota->save();
        
        return Redirect::to('/admin-menu/mascotas/ver');
    }

    function addPersona(Request $request){
        $originalDate = $request->input('fecha_nac');
        $newDate = date("Y/m/d", strtotime($originalDate));
        $persona = new Persona;
        $persona->nombre = $request->input('nombre');
        $persona->fecha_nac = $newDate;
        $persona->telefono = $request->input('telefono');
        $persona->direccion = $request->input('direccion');
        $persona->pais = $request->input('pais');
        $persona->correo = $request->input('correo');
        $persona->password = $request->input('password');

        $persona->save();
        return Redirect::to('/admin-menu/personas/ver');
    }

    function verCitas(){
        return view('ver_citas');
    }

    function addPerson(){
        return view('añadir-persona');
    }
    
    function editPerson($id=null){
        $persona = Persona::find($id);
        $mascotas = Mascota::where('persona_id', '=', $id)->orderBy('nombre','desc')->get();
        return view('editar-persona', ['persona' => $persona, 'mascotas' => $mascotas]);
    }

    function editMascota($id=null){
        $mascota = Mascota::find($id);
        $persona = \App\Persona::find($mascota->persona_id);
        return view('editar-mascota', ['mascota' => $mascota, 'persona' => $persona]);
    }

    function verForo(){
        return view('ver_foro');
    }

    function showHistory(){
        return view('ver-historial');
    }

    function addHistory(){
        return view('añadir-historial');
    }

    function editHistory(){
        return view('editar-historial');
    }

    function addForo(){
        return view('añadir-foro');
    }

    function showForo(){
        return view('ver-tema-foro');
    }
}
