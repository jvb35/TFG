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
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead">
                <tr class="warning">
                    <th> Nombre mascota </th>
                    <th> Tipo consulta </th>
                    <th> Propietario </th>
                    <th> Telefono </th>
                    <th> Inicio cita </th>
                    <th> Fin cita </th>
                    <th> Editar </th>
                    <th> Borrar </th>
                </tr>
            </thead>
            @foreach($citas as $cita)
                <tbody>
                    <tr>
                        <td>{{ $cita->nombre_mascota }}</td>
                        <td>{{ $cita->tipo_consulta }}</td>
                        <td>{{ $cita->propietario }}</td>
                        <td>{{ $cita->telefono }}</td>
                        <td>{{ $cita->inicio_consulta }}</td>
                        <td>{{ $cita->fin_consulta }}</td>

                        <th><a onclick="editarCita({{$cita->id}});" class="btn btn-success"> Editar </a></th>

                        <th>
                        <a href="" class="btn btn-danger"> Eliminar </a>
                        </th>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>

<script>
        function eliminarMascota(id){
            r= confirm('¿Esta seguro de desea elmininar esto?');
            if(r == true){
                window.location.href="/admin-menu/mascotas/borrar/" + id;
            }else{
                window.location.href="/admin-menu/personas/ver";
            }
        }

        function editarCita(id){
            window.location.href="/admin-menu/citas/editar/" + id;
        }
    </script>




@endsection