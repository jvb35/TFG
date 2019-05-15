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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function checklogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if(Auth::attempt($user_data))
        {
            if(Auth::user()->rol == 'veterinario' || Auth::user()->rol == 'admin'){
                return redirect('/admin-menu/mascotas/ver');
            }
            else{
                $mascotas = Mascota::where('propietario', '=', Auth::user()->name)->get();
                return view('elegir-mascota', ['mascotas' => $mascotas]);
            }
            
        }
        else
        {
            return back()->with('error','Errores en las credenciales');
        }
    }

    function successlogin(){
        return view('successlogin');
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
