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


class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        $cita = [];
        
        foreach($citas as $row){
            
            $cita[] = \Calendar::event(
                $row->nombre_mascota, //event title
                false, //full day event?
                new \DateTime($row->inicio_consulta), //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
                new \DateTime($row->fin_consulta), //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
                $row->id, //optional event ID
                [
                    $row->tipo_consulta,
                    $row->propietario,
                    $row->telefono,
                    'color' => $row->color,
                    //any other full-calendar supported parameters
                ]
            );
        }

        $calendar = \Calendar::addEvents($cita);

        return view('ver_citas', compact('citas','calendar'));
    }

    public function addCita(Request $request)
    {
        $this->validate($request,[
            'nombre_mascota' => 'required',
            'tipo_consulta' => 'required',
            'propietario' => 'required',
            'telefono' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
        ]);

        $cita = new Cita;
        $cita->nombre_mascota = $request->input('nombre_mascota');
        $cita->tipo_consulta = $request->input('tipo_consulta');
        $cita->propietario = $request->input('propietario');
        $cita->telefono = $request->input('telefono');
        if($cita->tipo_consulta == 'Consulta')
        {
            $cita->color = '#87CEFA';
        }else if($cita->tipo_consulta == 'Peluqueria')
        {
            $cita->color = '#90EE90';
        }
        else{
            $cita->color = '#FFA500';
        }
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $fecha_inicial =  $fecha." ".$hora.":00";
        $cita->inicio_consulta = $fecha_inicial;
        $minutoAnadir=60;       
        $segundos_horaInicial=strtotime($hora);       
        $segundos_minutoAnadir=$minutoAnadir*60;
        $nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
        $cita->fin_consulta = $fecha." ".$nuevaHora.":00";

        $personas = DB::table('personas')->get();
        foreach($personas as $persona){
            if($persona->nombre == $request->input('propietario')){
                $cita->persona_id = $persona->id;
            }
        }
        $mascotas = DB::table('mascotas')->get();
        foreach($mascotas as $mascota){
            if($mascota->nombre == $request->input('nombre_mascota')){
                $cita->mascota_id = $mascota->id;
            }
        }
        $cita->personal_id = Auth::user()->localizador;

        $cita->save();

        return redirect('/admin-menu/citas/ver')->with('success', 'Cita añadida');
    }

    public function editCitas()
    {
        $citas = Cita::orderBy('inicio_consulta', 'asc')->paginate(10);
        return view('editar_citas')->with('citas',$citas);
    }

    public function edit($id)
    {
        $events = Cita::find($id);
        return view('editform')->with('events',$events);
    }

    public function updateCita(Request $request)
    {
        if($_POST)
        {
            Cita::where('nombre_mascota', '=', $request->input('nombre_mascota'))->update(
                array(
                    'nombre_mascota' => $request->input('nombre_mascota'),
                    'tipo_consulta' => $request->input('tipo_consulta'),
                    'propietario' => $request->input('propietario'),
                    'telefono' => $request->input('telefono'),
                    'inicio_consulta' => $request->input('start_date'),
                    'fin_consulta' => $request->input('end_date'),
                    'color' => '#FFA500'
                )
            );
        }

        return redirect('/admin-menu/citas/ver')->with('success', 'Cita actualizada');
    }

    function pedirCita($id=null){
        $mascota = Mascota::find($id);
        $persona = Persona::where('nombre', '=', $mascota->propietario)->first();
        return view('Cliente.pedir-cita', ['mascota' => $mascota, 'persona' => $persona]);
    }

    function addCitaCliente(Request $request){
        $cita = new Cita;
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $cita->nombre_mascota = $request->input('nombre_mascota');
        $cita->propietario = $request->input('nombre_persona');
        $cita->telefono = $request->input('telefono');
        $cita->tipo_consulta = $request->input('tipo_consulta');

        if($cita->tipo_consulta == 'Consulta')
        {
            $cita->color = '#87CEFA';
        }else if($cita->tipo_consulta == 'Peluqueria')
        {
            $cita->color = '#90EE90';
        }
        else{
            $cita->color = '#FFA500';
        }
        $fecha_inicial =  $fecha." ".$hora.":00";
        $cita->inicio_consulta = $fecha_inicial;
        $minutoAnadir=60;       
        $segundos_horaInicial=strtotime($hora);       
        $segundos_minutoAnadir=$minutoAnadir*60;
        $nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
        $cita->fin_consulta = $fecha." ".$nuevaHora.":00";

        $personas = DB::table('personas')->get();
        foreach($personas as $persona){
            if($persona->nombre == $request->input('nombre_persona')){
                $cita->persona_id = $persona->id;
            }
        }
        $mascotas = DB::table('mascotas')->get();
        foreach($mascotas as $mascota){
            if($mascota->nombre == $request->input('nombre_mascota')){
                $cita->mascota_id = $mascota->id;
            }
        }
        $cita->personal_id = 1; 

        $cita->save();

        return back()->with('success', 'Cita añadida');
    }
}
