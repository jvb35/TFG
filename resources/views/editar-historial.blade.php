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

<div class="container">
	<div class="row">
    <br>
		<form class="form-horizontal">

      <fieldset>
        <legend>Editar historial</legend>

        <div class="form-group">
          <label class="col-md-2 control-label" for="cedula">Nombre</label>  
          <div class="col-md-3">
            <input type="text" placeholder="Solicitante" class="form-control input-md">            
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="sistema">Estado</label>
          <div class="col-md-3">
            <select class="form-control">
              <option value="1">Realizada</option>
              <option value="2">Pendiente</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="descripcion">Descripción</label>
          <div class="col-md-3">                     
            <textarea class="form-control"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="cedula">Fecha</label>  
          <div class="col-md-3">
            <input type="date" class="form-control input-md">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label"></label>
          <div class="col-md-8">
            <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
            <a data-original-title="Volver atrás" data-toggle="tooltip" type="button" class="btn btn-default" href="/admin-menu/mascotas/historial">Atrás</a>
          </div>
        </div>

      </fieldset>
    </form>

	</div>
</div>






@endsection