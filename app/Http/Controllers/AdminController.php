<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
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
        return view('ver_mascotas');
    }

    function ver_personas(){
        return view('ver_personas');
    }

    function showMascota(){
        return view('añadir_mascota');
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
        $mascota->persona_id = 1;
  
        
        $mascota->save();
        
        return Redirect::to('/admin-menu/mascotas/ver');
    }

    function verCitas(){
        return view('ver_citas');
    }

    function addPerson(){
        return view('añadir-persona');
    }
    
    function editPerson(){
        return view('editar-persona');
    }

    function editMascotas(){
        return view('editar-mascota');
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
