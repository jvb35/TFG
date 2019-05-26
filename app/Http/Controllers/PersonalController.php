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

class PersonalController extends Controller
{
    function ver_personal(){
        $personals = DB::table('personals')->paginate(10);
        return view('ver_personal', ['personals' => $personals]);
    }

    function deletePersonal($id=null){
        $personal = Personal::find($id);
        $personal->delete();

        return Redirect::to('/admin-menu/personal/ver');
    }

    public function verPerfil(){
        $persona = Personal::find(Auth::user()->localizador);
        return view('ver-perfil', ['persona' => $persona]);
    }

    public function changePassword(Request $request){
        $persona = Personal::find(Auth::user()->localizador);

        $contra1 = $request->input('password1');
        $contra2 = $request->input('password2');
        if($contra1 == $contra2){
            $contraseñaEncriptada = Hash::make($request->input('password1'));
            Personal::where('nombre', '=', $persona->nombre)->update(
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

    function addPersonal(Request $request){
        $originalDate = $request->input('fecha_nac');
        $newDate = date("Y/m/d", strtotime($originalDate));
        $personal = new Personal;
        $personal->correo = $request->input('correo');
        $personal->nombre = $request->input('nombre');
        $personal->fecha_nac = $newDate;
        $personal->telefono = $request->input('telefono');
        $personal->direccion = $request->input('direccion');
        $personal->especialidad = $request->input('especialidad');
        $contraseñaEncriptada = Hash::make($request->input('password'));
        $personal->password = $contraseñaEncriptada;

        $ruta = public_path().'/images/personal/';

        // recogida del form
        $imagenOriginal = $request->file('photo');

        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
        $temp_name = $personal->nombre . '.' . $imagenOriginal->getClientOriginalExtension();

        $imagen->resize(300,300);

        // guardar imagen
        // save( [ruta], [calidad])
        $imagen->save($ruta . $temp_name, 100);
        $personal->filename = $temp_name;

        $personal->save();

        $user = new User;
        $user->name = $request->input('nombre');
        $user->email = $request->input('correo');
        $user->password = $contraseñaEncriptada;
        $user->rol = "veterinario";
        $user->remember_token = Str::random(10);
        $user->filename = $temp_name;
        $user->localizador = $personal->id;
        $user->save();

        return Redirect::to('/admin-menu/personal/ver');

    }

    function verPersonal(){
        return view('añadir_personal');
    }

}
