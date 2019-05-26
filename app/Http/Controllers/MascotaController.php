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

class MascotaController extends Controller
{
    function ver_mascotas(){
        $mascotas = DB::table('mascotas')->paginate(10);
        return view('ver_mascotas', ['mascotas' => $mascotas]);
    }

    function deleteMascota($id=null){
        $mascota = Mascota::find($id);
        $mascota->delete();

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
        if($request->input('masc') == "macho"){
            $mascota->sexo = "M";
        }
        else{
            $mascota->sexo = "F";
        }
        
        $mascota->peso = $request->input('peso');
        $mascota->propietario = $request->input('propietario');
        $personas = \App\Persona::get();
        foreach ($personas as $persona){
            if($persona->nombre == $mascota->propietario){
                $mascota->persona_id = $persona->id;
            }
        }
          // ruta de las imagenes guardadas
        $ruta = public_path().'/images/mascotas/';

        // recogida del form
        $imagenOriginal = $request->file('photo');

        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
        $temp_name = $mascota->nombre . '.' . $imagenOriginal->getClientOriginalExtension();

        $imagen->resize(300,300);

        // guardar imagen
        // save( [ruta], [calidad])
        $imagen->save($ruta . $temp_name, 100);
        $mascota->filename = $temp_name;
        $mascota->save();

        $historial = new Historial;
        $historial->mascota_id = $mascota->id;

        $historial->save();
        
        return Redirect::to('/admin-menu/mascotas/ver')->with('success', 'Mascota añadida correctamente');
    }

    
    function showMascota(){
        $personas = \App\Persona::get();
        return view('añadir_mascota', ['personas' => $personas]);
    }

    function editMascota($id=null){
        $mascota = Mascota::find($id);
        $persona = \App\Persona::find($mascota->persona_id);
        return view('editar-mascota', ['mascota' => $mascota, 'persona' => $persona]);
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

    public function infoMascota($id=null){
        $mascota = Mascota::find($id);
        $fecha_actual = getdate();
        $cita = Cita::where('mascota_id', '=', $id)->where('inicio_consulta', '>=',$fecha_actual)->first();
        return view('Cliente.ver_info_mascota', ['mascota' => $mascota, 'cita' => $cita]);
    }

    function elegir_mascota(){
        $mascotas = Mascota::where('propietario', '=', Auth::user()->name)->get();
        return view('elegir-mascota', ['mascotas' => $mascotas]);
    }

}
