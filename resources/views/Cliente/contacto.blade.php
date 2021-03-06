<!DOCTYPE html>
<html>
<head>
  <title>PetZone</title>
  <link rel="shortcut icon" href="/images/logo_mini.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<style>
  @import url('https://fonts.googleapis.com/css?family=Lato:300,400');

html, body {
  font-family: 'Lato', serif;
  background-color: #D3E3F8;  
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

.date-body{
  background-color: #228B22;padding-bottom: 5px;
}
.date-body .date-title{
  color: white;
}

.date-body .date-content{
  background-color: white;margin-left: 5px;margin-right: 5px;
}
.date-body .date-content p.dia{
  margin: 0; font-size: 45px; font-weight: bold;
}
.nomargin{
  margin: 0;
}

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
         <li><a href="/contacto/{{$mascota->id}}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Consultorio</a></li> 
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
            <li><a onclick="location.href='/logout';"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesión</a></li>
          </ul>
        </div>
      </ul>
    </div>
  </div>
</nav>

@if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success')}}</p>
    </div>
@endif

<div class="container" style="margin-top:100px; background-color: #FFFFFF">
    <div class="row">
        <div class="col-md-8" >
            <div class="well well-sm" style="margin-left:-15px; margin-bottom: 0px;">

                <div class="row">

                    <div class="col-md-5" style="margin-left: 10px;">
                      <form class="row contact_form" action="{{url('/mailCliente')}}" method="post" id="contactForm" novalidate="novalidate">
                      {{ csrf_field()}}
                      {{ method_field('POST')}}
                          <div class="form-group">
                              <label for="name">
                                  Nombre</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Introduzca el nombre" required="required" />
                          </div>
                          <div class="form-group">
                              <label for="email">
                                  Correo</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                  </span>
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Introduzca el correo" required="required" /></div>
                          </div>
                          <div class="form-group">
                              <label for="subject">
                                  Veterinario</label>
                              <select id="subject" name="veterinario" class="form-control" required="required">
                                  <option value="" selected="">Elige uno:</option>
                                  @foreach ($personals as $personal)
                                      <option value="{{$personal->nombre}}">{{$personal->nombre}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="name">
                                  Mensaje</label>
                              <textarea name="mensaje" id="mensaje" class="form-control" rows="10" cols="10" required="required"
                                  placeholder="Introduzca un mensaje"></textarea>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                              Enviar</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
        <div class="col-md-4" >
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Nuestra oficina</legend>
            <address>
                <strong>ClinicaVeter</strong><br>
                Calle los Almendros 10<br>
                Altea, Alicante<br>
                <abbr title="Phone">
                    P:</abbr>
                965847685
            </address>
            <address>
                <strong>Correo</strong><br>
                <a href="mailto:#">clinicaveter@hotmail.com</a>
            </address>
            </form>
        </div>
    </div>
</div>
</body>
</html>