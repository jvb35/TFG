<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</head>

@extends('panel-admin')
@section('content')

<div class="container">
    <div class="jumbotron">

        <form action="{{action('EventController@update', $events['id']) }}" method="POST">
            {{ csrf_field() }}
            <div class="container">
                <div class="jumbotron" >
                    <h2> Editar Cita </h2>
                    <hr>
                    <input type="hidden" name="_method" value="UPDATE" />
                    <div class="form-group">
                        <label>Nombre mascota</label>
                        <input type="text" class="form-control" name="nombre_mascota" placeholder="Enter Name" value="{{$events->nombre_mascota}}">
                    </div>
                    <div class="form-group">
                        <label>Tipo consulta</label>
                        <input type="text" class="form-control" name="tipo_consulta" placeholder="Enter Name" value="{{$events->tipo_consulta}}">
                    </div>
                    <div class="form-group">
                        <label>Propietario</label>
                        <input type="text" class="form-control" name="propietario" placeholder="Enter Name" value="{{$events->propietario}}">
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Enter Name" value="{{$events->telefono}}">
                    </div>
                    <div class="form-group">
                        <label>Inicio cita </label>
                        <input type="datetime-local" class="form-control" name="start_date" class="date" placeholder="Enter Start date" value="{{$events->start_date}}">

                    </div>
                    <div class="form-group">
                        <label>Fin cita</label>
                        <input type="datetime-local" class="form-control" name="end_date" class="date" placeholder="Enter End date" value="{{$events->end_date}}">
                    </div>
                    {{ method_field('PUT')}}
                    <button type="submit" name="submit" class="btn btn-success">Actualizar</button>

                </div>
            </div>
        </form>
    </div>
</div>















@endsection