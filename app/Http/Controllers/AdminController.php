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

    function verHisto($id=null){
        $consultas = Consulta::where('historial_id', '=', $id)->orderBy('fecha','asc')->get();
        $mascota = Mascota::find($id);
        return view('Cliente.historial', ['consultas' => $consultas, 'mascota' => $mascota]);
    }

    function show_Foro($id=null){
        $temas = DB::table('temas')->paginate(10);
        $mascota = Mascota::find($id);
        return view('Cliente.ver-foro', ['temas' => $temas, 'mascota' => $mascota]);
    }

    function ver_Tema($id=null, $idTema=null){
        $tema = Tema::find($idTema);
        $mascota = Mascota::find($id);
        return view('Cliente.ver-tema', ['tema' => $tema, 'mascota' => $mascota]);
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

    function elegir_mascota(){
        $mascotas = Mascota::where('propietario', '=', Auth::user()->name)->get();
        return view('elegir-mascota', ['mascotas' => $mascotas]);
    }

    function admin_menu(){
        return view('panel-admin');
    }

    function ver_mascotas(){
        $mascotas = DB::table('mascotas')->paginate(10);
        return view('ver_mascotas', ['mascotas' => $mascotas]);
    }

    function ver_personas(){
        $personas = DB::table('personas')->paginate(5);
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
        $tema->personal_id = Auth::user()->localizador;
        $tema->foro_id = 1;

        $tema->save();
        return Redirect::to('/admin-menu/foro/ver');
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

    public function showCitas()
    {
        $citas = Cita::orderBy('start_date', 'asc')->get();
        return view('editar_citas')->with('citas',$citas);
    }

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

    public function editCitas()
    {
        $citas = Cita::orderBy('inicio_consulta', 'asc')->get();
        return view('editar_citas')->with('citas',$citas);
    }

    public function edit($id)
    {
        $events = Cita::find($id);
        return view('editform')->with('events',$events);
    }

    public function prueba(){
        return view('template');
    }

    public function infoMascota($id=null){
        $mascota = Mascota::find($id);
        $fecha_actual = getdate();
        $cita = Cita::where('mascota_id', '=', $id)->where('inicio_consulta', '>=',$fecha_actual)->first();
        return view('Cliente.ver_info_mascota', ['mascota' => $mascota, 'cita' => $cita]);
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

    public function verPerfil(){
        $persona = Personal::find(Auth::user()->localizador);
        return view('ver-perfil', ['persona' => $persona]);
    }

    public function contact($id=null){
        $mascota = Mascota::find($id);
        $personals = DB::table('personals')->get();
        return view('Cliente.contacto', ['mascota' => $mascota, 'personals' => $personals]);
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
}
