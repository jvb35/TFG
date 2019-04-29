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
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private $mascotas;
    private $personas;
    private $identificador;

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

    function ver_personal(){
        $personals = DB::table('personals')->paginate(10);
        return view('ver_personal', ['personals' => $personals]);
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

    function deleteTema($id=null){
        $tema = Tema::find($id);
        $tema->delete();

        return Redirect::to('/admin-menu/foro/ver');
    }

    function deletePersonal($id=null){
        $personal = Personal::find($id);
        $personal->delete();

        return Redirect::to('/admin-menu/personal/ver');
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

    function saveHistorial(Request $request){
        if($_POST)
        {
            $originalDate = $request->input('fecha');
            $newDate = date("Y/m/d", strtotime($originalDate));
            $valor = $request->input('estado');
            $estado = "Ninguno";
            if($valor == 1){
                $estado = "Realizada";
            } else if ($valor == 2){
                $estado = "Pendiente";
            }
            else{
                $estado = "Cancelada";
            }
    
            Consulta::where('nombre', '=', $request->input('nombre'))->update(
                array(
                    'nombre' => $request->input('nombre'),
                    'fecha' => $newDate,
                    'descripcion' => $request->input('descripcion'),
                    'estado' => $estado
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

        $historial = new Historial;
        $historial->mascota_id = $mascota->id;

        $historial->save();
        
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

    function verTema($id=null){
        $tema = Tema::find($id);
        return view('ver-tema-foro', ['tema' => $tema]);
    }

    function verForo(){
        $temas = \App\Tema::get();
        return view('ver_foro', ['temas' => $temas]);
    }

    function showHistory($id=null){
        $consultas = Consulta::where('historial_id', '=', $id)->orderBy('fecha','desc')->get();
        $mascota = Mascota::find($id);
        return view('ver-historial', ['consultas' => $consultas, 'id' => $id, 'mascota' => $mascota]);
    }

    function addHistory($id=null){
        return view('añadir-historial', ['id' => $id]);
    }

    function editConsulta($id=null){
        $consulta = Consulta::find($id);
        return view('editar-historial', ['consulta' => $consulta]);
    }

    function addForo(){
        return view('añadir-foro');
    }

    function showForo(){
        return view('ver-tema-foro');
    }

    function verPersonal(){
        return view('añadir_personal');
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
        $personal->password = $request->input('password');

        $personal->save();
        return Redirect::to('/admin-menu/personal/ver');

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
        $tema->fecha = "2019/05/02";
        $tema->personal_id = 2;

        $tema->save();
        return Redirect::to('/admin-menu/foro/ver');
    }

    function addConsulta(Request $request){
        $originalDate = $request->input('fecha');
        $newDate = date("Y/m/d", strtotime($originalDate));
        $consulta = new Consulta;
        $consulta->nombre = $request->input('nombre');
        $consulta->fecha = $newDate;
        $consulta->descripcion = $request->input('descripcion');
        $valor = $request->input('estado');
        if($valor == 1){
            $consulta->estado = "Realizada";
        } else{
            $consulta->estado = "Pendiente";
        }

        $consulta->historial_id = $request->input('id');
        $consulta->personal_id = 1;

        $consulta->save();
        return Redirect::to('/admin-menu/mascotas/historial/{{$consulta->historial_id}}');
    }
}
