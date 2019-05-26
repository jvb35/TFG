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

class PersonaController extends Controller
{
    function ver_personas(){
        $personas = DB::table('personas')->paginate(10);
        return view('ver_personas', ['personas' => $personas]);
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
        $contraseñaEncriptada = Hash::make($request->input('password'));
        $persona->password = $contraseñaEncriptada;
        $persona->save();

        $user = new User;
        $user->name = $request->input('nombre');
        $user->email = $request->input('correo');
        $user->password = $contraseñaEncriptada;
        $user->rol = "cliente";
        $user->remember_token = Str::random(10);
        $user->filename ="";
        $user->localizador = $persona->id;
        $user->save();
        
        $data = array(
            'name' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'contra' => $request->input('password'),
        );

        Mail::send('correo-new-user', $data, function ($message) use ($data){
            $message->from('clinicaveter3@gmail.com', 'Clinica Veterinaria');
            $message->to($data['correo'])->subject('Información');
        });

        return Redirect::to('/admin-menu/personas/ver')->with('success','Persona añadida correctamente');
    }

    function showPerson(){
        return view('añadir-persona');
    }

    function editPerson($id=null){
        $persona = Persona::find($id);
        $mascotas = Mascota::where('persona_id', '=', $id)->orderBy('nombre','desc')->get();
        return view('editar-persona', ['persona' => $persona, 'mascotas' => $mascotas]);
    }

    public function changePass(Request $request){
        $persona = Persona::find(Auth::user()->localizador);

        $contra1 = $request->input('password1');
        $contra2 = $request->input('password2');
        if($contra1 == $contra2){
            $contraseñaEncriptada = Hash::make($request->input('password1'));
            Persona::where('nombre', '=', $persona->nombre)->update(
                array(
                    'password' => $contraseñaEncriptada
                )
            );

            User::where('name', '=', $persona->nombre)->update(
                array(
                    'password' => $contraseñaEncriptada
                )
            );
            return back()->with('success', 'Contraseña cambiada correctamente');
        }
        else{
            return back()->with('error', 'Las contraseñas no coinciden');
        }
        return back()->with('error', 'Las contraseñas no coinciden');
           
    }

    function verPerfilPersona($id=null){
        $mascot = DB::table('mascotas')->get();
        $nombre = "Prueba";
        foreach($mascot as $mascota){
            if($mascota->id == $id){
                $nombre = $mascota->propietario;
            }
        }
        $persona = Persona::where('nombre', '=', $nombre)->first();
        $mascotas = Mascota::where('propietario', '=', $nombre)->orderBy('nombre','desc')->get();
        $mascota = Mascota::find($id);

        return view('Cliente.ver-perfil', ['persona' => $persona, 'mascotas' => $mascotas, 'mascota' => $mascota]);
    }

    public function sendmailCliente(Request $request){

        $valor = $request->input('veterinario');
        $personals = DB::table('personals')->get();
        $correo = "";
        foreach($personals as $personal){
            if($personal->nombre == $valor){
                $correo = $personal->correo;
            }
        }

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'correo' => $correo,
            'mensaje' => $request->input('mensaje'),
        );

        Mail::send('Cliente.correo-cliente', $data, function ($message) use ($data){
            $message->from($data['email'], $data['name']);
            $message->to($data['correo'])->subject('Información');
        });

        return back()->with('success', 'Mensaje enviado');

    }



    public function contact($id=null){
        $mascota = Mascota::find($id);
        $personals = DB::table('personals')->get();
        return view('Cliente.contacto', ['mascota' => $mascota, 'personals' => $personals]);
    }

}
