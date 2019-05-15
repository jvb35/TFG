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


@if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success')}}</p>
    </div>
@endif
<div class="container">
	<div class="row">
  <br>
    <form class="form-horizontal" action="{{action('AdminController@addConsulta')}}" method="POST">
      {{ csrf_field()}}
      {{ method_field('POST')}}

      <fieldset>
<!-- Form Name -->
        <legend>Añadir consulta</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-2 control-label" for="nombre">Nombre</label>  
          <div class="col-md-3">
          <input id="nombre" name="nombre" type="text" placeholder="Introduzca un nombre" class="form-control input-md">
            
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-2 control-label" for="sistema">Estado</label>
          <div class="col-md-3">
            <select id="estado" name="estado" class="form-control">
              <option value="1">Realizada</option>
              <option value="2">Pendiente</option>
            </select>
          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-2 control-label" for="descripcion">Descripción</label>
          <div class="col-md-3">                     
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="fecha">Fecha</label>  
          <div class="col-md-3">
          <input id="fecha" name="fecha" type="date" class="form-control input-md">
            
          </div>
        </div>

        <div class="form-group" style="display: none">
          <label class="col-md-2 control-label" for="fecha">Fecha</label>  
          <div class="col-md-3">
          <input id="fecha" name="id" type="text" class="form-control input-md" value="{{$id}}">
            
          </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-2 control-label" ></label>
          <div class="col-md-8">
            <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
            <input type="button" class="btn btn-default" onclick="location.href='/admin-menu/mascotas/historial/{{$id}}';" value="Cancelar">
          </div>
        </div>

      </fieldset>
    </form>


	</div>
</div>






@endsection