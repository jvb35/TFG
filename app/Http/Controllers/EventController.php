<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\Laravel\Fullcalendar\Facades\Calendar;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $event = [];
        
        foreach($events as $row){
            
            $event[] = \Calendar::event(
                $row->nombre_mascota, //event title
                false, //full day event?
                new \DateTime($row->start_date), //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
                new \DateTime($row->end_date), //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
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

        $calendar = \Calendar::addEvents($event);
        return view('ver_citas', compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre_mascota' => 'required',
            'tipo_consulta' => 'required',
            'propietario' => 'required',
            'telefono' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $events = new Event;

        $events->nombre_mascota = $request->input('nombre_mascota');
        $events->tipo_consulta = $request->input('tipo_consulta');
        $events->propietario = $request->input('propietario');
        $events->telefono = $request->input('telefono');
        if($events->tipo_consulta == 'Consulta')
        {
            $events->color = '#87CEFA';
        }else if($events->tipo_consulta == 'Peluqueria')
        {
            $events->color = '#90EE90';
        }
        else{
            $events->color = '#FFA500';
        }
        
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();

        return redirect('/admin-menu/citas/ver')->with('success', 'Events Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
