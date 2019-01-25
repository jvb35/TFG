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
        <div class="row">
            @if(count($errors) > 0)
                <div class="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success')}}</p>
                </div>
            @endif

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #2e6da4; color: white;">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#miModal">
                                Añadir cita
                            </button>

                    </div>
                    
                    <div id="calendar" class="panel-body" style="background-color: white;">
                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Añadir cita</h4>
			</div>
			<div class="modal-body">
                <form method="POST" action="{{url('/admin-menu/citas/añadir')}}">
                            {{ csrf_field() }}
                            <label for="">Nombre mascota</label>
                            <input type="text" class="form-control" name="nombre_mascota" placeholder="Introduza el nombre de la mascota" /><br /><br />
                            <label for="">Tipo de consulta</label>
                            <br>
                            <select name="tipo_consulta">
                                <option value="Consulta">Consulta</option> 
                                <option value="Peluqueria">Peluquería</option> 
                                <option value="Operacion">Operación</option>
                            </select>
                            <br>
                            <br>
                            <label for="">Propietario</label>
                            <input type="text" class="form-control" name="propietario" placeholder="Introduza el tipo de consulta" /><br /><br />
                            <label for="">Teléfono</label>
                            <input type="number" class="form-control" name="telefono" placeholder="Introduza el tipo de consulta" /><br /><br />
                            <label for="">Fecha comienzo</label>
                            <input type="datetime-local" class="form-control" name="start_date" class="date" placeholder="Enter start date" /><br /><br />
                            <label for="">Fecha fin</label>
                            <input type="datetime-local" class="form-control" name="end_date" class="date" placeholder="Enter end date" /><br /><br />

                            <input type="submit" name="submit" class="btn btn-primary" value="Guardar" />

                </form>
			</div>
		</div>
	</div>
</div>




@endsection