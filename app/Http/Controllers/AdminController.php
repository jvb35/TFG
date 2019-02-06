<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    function addMascota(){
        return view('añadir_mascota');
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
