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
		<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Añadir historial</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cedula">Nombre</label>  
  <div class="col-md-4">
  <input id="cedula" name="cedula" type="text" placeholder="Solicitante" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sistema">Estado</label>
  <div class="col-md-4">
    <select id="sistema" name="sistema" class="form-control">
      <option value="1">Realizada</option>
      <option value="2">Pendiente</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Descripción</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="cedula">Fecha</label>  
  <div class="col-md-4">
  <input id="cedula" name="cedula" type="date" class="form-control input-md">
    
  </div>
</div>


<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" ></label>
  <div class="col-md-8">
    <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
    <button id="atras" name="atras" class="btn btn-default" href="/admin-menu/mascotas/historial">Atrás</button>
  </div>
</div>

</fieldset>
</form>

	</div>
</div>






@endsection