<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>

    </style>

</head>

@extends('panel-admin')
@section('content')


<form class="form-horizontal" action="{{url('/admin-menu/historial/save/{id}')}}" role="form" method="POST">
{{ csrf_field()}}
{{ method_field('POST')}}
<div class="container">
	<div class="row">
    <br>

      <fieldset>
        <legend>Editar historial</legend>

        <div class="form-group">
          <label class="col-md-2 control-label" for="cedula">Nombre</label>  
          <div class="col-md-3">
            <input type="text" name="nombre" value="{{$consulta->nombre}}" class="form-control input-md">            
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="sistema">Estado</label>
          <div class="col-md-3">
            <select class="form-control" name="estado">
              <option value="1">Realizada</option>
              <option value="2">Pendiente</option>
              <option value="3">Cancelada</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="descripcion">Descripción</label>
          <div class="col-md-3">                     
            <textarea class="form-control" name="descripcion">{{$consulta->descripcion}}</textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="cedula">Fecha</label>  
          <div class="col-md-3">
            <input type="date" name="fecha" value="{{$consulta->fecha}}" class="form-control input-md">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label"></label>
          <div class="col-md-8">
            <button id="enviar" name="enviar" class="btn btn-primary">Guardar</button>
            <a data-original-title="Volver atrás" data-toggle="tooltip" type="button" class="btn btn-default" onclick="location.href='/admin-menu/mascotas/historial/{{$consulta->historial_id}}';">Atrás</a>
          </div>
        </div>

      </fieldset>
    </form>

	</div>
</div>






@endsection