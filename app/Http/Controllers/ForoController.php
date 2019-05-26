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

class ForoController extends Controller
{
    function deleteTema($id=null){
        $tema = Tema::find($id);
        $tema->delete();

        return Redirect::to('/admin-menu/foro/ver');
    }

    function verForo(){
        $temas = \App\Tema::get();
        return view('ver_foro', ['temas' => $temas]);
    }

    function addForo(){
        return view('añadir-foro');
    }

    function addTema(Request $request){
        $tema = new Tema;
        $tema->nombre = $request->input('nombre');
        $tema->descripcion = $request->input('descripcion');
        $tema->autor = $request->input('autor');
        $tema->telefono = $request->input('telefono');
        $tema->direccion = $request->input('direccion');
        $tema->municipio = $request->input('municipio');
        $tema->correo = $request->input('correo');
        $fecha_actual = getdate();
        $tema->fecha = "2019/05/20";
        $tema->personal_id = Auth::user()->localizador;
        $tema->foro_id = 1;

        $ruta = public_path().'/images/temas/';

        // recogida del form
        $imagenOriginal = $request->file('photo');

        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
        $temp_name = $tema->id . '.' . $imagenOriginal->getClientOriginalExtension();

        $imagen->resize(300,300);

        // guardar imagen
        // save( [ruta], [calidad])
        $imagen->save($ruta . $temp_name, 100);
        $tema->filename = $temp_name;

        $tema->save();
        return Redirect::to('/admin-menu/foro/ver');
    }

    function verTema($id=null){
        $tema = Tema::find($id);
        return view('ver-tema-foro', ['tema' => $tema]);
    }

    function ver_Tema($id=null, $idTema=null){
        $tema = Tema::find($idTema);
        $mascota = Mascota::find($id);
        return view('Cliente.ver-tema', ['tema' => $tema, 'mascota' => $mascota]);
    }

    function show_Foro($id=null){
        $temas = DB::table('temas')->paginate(10);
        $mascota = Mascota::find($id);
        return view('Cliente.ver-foro', ['temas' => $temas, 'mascota' => $mascota]);
    }
}
