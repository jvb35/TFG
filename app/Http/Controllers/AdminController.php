<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use Illuminate\Support\Facades\Redirect;
use App\Persona;
use App\Personal;
use App\Tema;
use App\Consulta;
use App\Historial;
use App\Cita;
use App\User;
use Illuminate\Support\Str;
use Validator;
use Auth;
use Mail;
use Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $mascotas;
    private $personas;
    private $identificador;

    function login(){
        return view('Publico.login');
    }

    function home(){
        return view('Publico.home');
    }

    function prova(){
        return view('main');
    }

    function quienes(){
        return view('Publico.quienes-somos');
    }

    function servicios(){
        return view('Publico.servicios');
    }

    function contacto(){
        return view('Publico.contacto');
    }

    function hotel(){
        return view('Publico.hotel');
    }

    function admin_menu(){
        return view('panel-admin');
    }

    function verCitas(){
        return view('ver_citas');
    }

    function addPerson(){
        return view('añadir-persona');
    }

    function showForo(){
        return view('ver-tema-foro');
    }




    public function showCitas()
    {
        $citas = Cita::orderBy('start_date', 'asc')->get();
        return view('editar_citas')->with('citas',$citas);
    }



    public function sendmail(Request $request){

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'mensaje' => $request->input('mensaje'),
        );

        Mail::send('Publico.correo', $data, function ($message) use ($data){
            $message->from($data['email'], $data['name']);
            $message->to('clinicaveter3@gmail.com')->subject('Información');
        });

        return redirect('/contacto')->with('success', 'Mensaje enviado');
    }

  




}
