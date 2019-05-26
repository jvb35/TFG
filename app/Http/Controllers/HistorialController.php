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

class HistorialController extends Controller
{
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
                $estados = "Cancelada";
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

        return back();

    }

    function verHisto($id=null){
        $consultas = Consulta::where('historial_id', '=', $id)->orderBy('fecha','asc')->get();
        $mascota = Mascota::find($id);
        return view('Cliente.historial', ['consultas' => $consultas, 'id' => $id, 'mascota' => $mascota]);
    }

    function showHistory($id=null){
        $consultas = Consulta::where('historial_id', '=', $id)->orderBy('fecha','asc')->get();
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

    function addConsulta(Request $request){
        $originalDate = $request->input('fecha');
        $newDate = date("Y/m/d", strtotime($originalDate));

        $consulta = new Consulta;
        $consulta->nombre = $request->input('nombre');
        $consulta->fecha = $request->input('fecha');
        $consulta->descripcion = $request->input('descripcion');
        $valor = $request->input('estado');
        if($valor == 1){
            $consulta->estado = "Realizada";
        } else{
            $consulta->estado = "Pendiente";
        }
        $consulta->historial_id = $request->input('id');
        $consulta->personal_id = Auth::user()->localizador;
        $consulta->save();
        return back()->with('success','Consulta añadida');
    }
}
