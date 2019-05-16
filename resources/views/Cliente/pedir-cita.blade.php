<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.es.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> 
</head>

<style>
  @import url('https://fonts.googleapis.com/css?family=Lato:300,400');

html, body {
  font-family: 'Lato', serif;  
}

.navbar-default {
  font-size: 1.15em;
  font-weight: 400;
  background-color: #006b96;
  padding: 10px;
  border: 0px;
  border-radius: 0px;
}

.navbar-default .navbar-nav>li>a {
  color: white;
}

.navbar-default .navbar-nav>li>a:hover {
  color: #cbf0ff;
}

.navbar-default .navbar-brand {
  color: #002433;
}

.navbar-default .navbar-brand:hover {
  color: #ffffff;
  text-shadow: 1px -1px 8px #b3e9ff;
}

.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
  background-color: #004059;
  color: white;
}

.navbar-default .navbar-toggle {
  border: none;
}

.navbar-default .navbar-collapse, .navbar-default .navbar-form {
  border: none;
}

.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #002433;
}

.navbar-default .navbar-toggle .icon-bar {
  background-color: #ffffff;
}

.dropdown-menu {
  background-color: #004059;
  color: white;
  border: 0px;
  border-radius: 2px;
  padding-top: 10px;
  padding-bottom: 10px;
}

.dropdown-menu>li>a {
  background-color: #004059;
  color: white;
}

.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
  background-color: #004059;
  color:white;
}

.dropdown-menu .divider {
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
    background-color: #003246;
}

.navbar-default .navbar-nav .open .dropdown-menu>li>a {
    color: #ffffff;
}

@media (max-width: 767px) { 
  .dropdown-menu>li>a {
    background-color: #006b96;
    color: #ffffff;
  }
  .dropdown-menu>li>a:hover {
    color: #ffffff;
  }
  
  .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover {
    color: #ffffff;
    background-color: transparent;
  }
  
  .dropdown-menu .divider {
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
    background-color: #005577;
  }
} /* END Media Query */


</style>
<body>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" >PetZone</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-left: 20px;">
      <ul class="nav navbar-nav">
         <li><a href="/info/{{$mascota->id}}"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Mascota</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Consultorio</a></li> 
         <li><a href="/cita/{{$mascota->id}}"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Pedir Cita</a></li> 
         <li><a href="/historial/{{$mascota->id}}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Historial</a></li>
         <li><a href="/foro/{{$mascota->id}}"><span class="glyphicon glyphicon-user"></span> Foro</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()->name}}
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="/perfil/{{$mascota->id}}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Perfil</a></li>
            <li><a href="/login"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesión</a></li>
          </ul>
        </div>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
<form class="form-horizontal" action="{{action('AdminController@addCitaCliente')}}" method="POST">
{{ csrf_field()}}
{{ method_field('POST')}}

  @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success')}}</p>
    </div>
  @endif
  <h1> Gestor de citas </h1>
  <div class="col-md-6" style="margin-top:30px; margin-right: -20px;">
    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
        <img id="img" class="thumb" src="/images/cita-consulta.jpg" title="Foto" style="width: 350px; height: 250px;"/>
    </div>
  </div>
  <div class="col-md-6" style="margin-top:30px; margin-left: -30px;">
    <div class="row">
        <div class='col-sm-9'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="fecha"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control" name="hora" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
              <select class="form-control" name="tipo_consulta">
                <option value="Consulta">Consulta</option>
                <option value="Peluqueria">Peluqueria</option>
                <option value="Operacion">Operacion</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nombre_mascota" value="{{$mascota->nombre}}" readonly="readonly" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nombre_persona" value="{{$persona->nombre}}" readonly="readonly" />
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="telefono" value="{{$persona->telefono}}" readonly="readonly" />
            </div>

            <div class="form-group">
                <div class="col-lg-offset-0 col-lg-10">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <input type="button" class="btn btn-default" onclick="location.href='/admin-menu/mascotas/ver';" value="Cancelar">
                </div>
            </div>
        </div>       
            
    </div>
  </div>
  </form>
</div>



</body>

<script >
    $(function () {
        
        $('#datetimepicker1').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true,
            todayHighlight: true
        });

        $('#datetimepicker3').datetimepicker({
            format: 'HH:mm',
            enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
        });
    });


</script>
</html>


