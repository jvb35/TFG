<!DOCTYPE html>
<html>
<head>
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
            <li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesión</a></li>
          </ul>
        </div>
      </ul>
    </div>
  </div>
</nav>


 <div class="container">
    <div class="row">
        <div class="col-md-6  offset-md-0  toppad" >
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Información</h2>
                    <table class="table table-user-information ">
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td>{{$mascota->nombre}}</td>
                            </tr>
                            <tr>
                                <td>Chip</td>
                                <td>{{$mascota->chip}}</td>
                            </tr>
                            <tr>
                                <td>Fecha Nacimiento</td>
                                <td>{{$mascota->fecha_nac}}</td>
                            </tr>
                            <tr>
                                <td>Raza</td>
                                <td>{{$mascota->raza}}</td>
                            </tr>
                            <tr>
                                <td>Especie</td>
                                <td>{{$mascota->especie}}</td>
                            </tr>                                                
                            <tr>
                                <td>Número pasaporte</td>
                                <td>{{$mascota->num_pasaporte}}</td>
                            </tr>
                            <tr>
                                <td>Sexo</td>
                                <td>{{$mascota->sexo}}</td>
                            </tr>
                            <tr>
                                <td>Peso</td>
                                <td>{{$mascota->peso}}</td>                                                        
                            </tr>
                            <tr>
                                <td>Propietario</td>
                                <td>{{$mascota->propietario}}</td>                                                        
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3  offset-md-0  toppad">
            <div class="col-md-6">
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <output id="list"></output>
                    <img id="img" class="thumb" src="/images/mascotas/{{$mascota->filename}}" title="Foto" style="width: 250px; height: 250px; margin-top: 70px; border:1px solid black;"/>

                </div>
            </div>
        </div>
        <?php
          $dato = $cita->inicio_consulta;
          $fecha = date('Y-m-d',strtotime($dato));
          $dia = date("d", strtotime($fecha));
          $mes = date("m", strtotime($fecha));
          $mes_escrito= "Hola";
          
          if($mes == 01){
            $mes_escrito = "Enero";
          } else if($mes == 02){
            $mes_escrito = "Febrero";
          } else if($mes == 03){
            $mes_escrito = "Marzo";
          } else if($mes == 04){
            $mes_escrito = "Abril";
          } else if($mes == 05){
            $mes_escrito = "Mayo";
          } else if($mes == 06){
            $mes_escrito = "Junio";
          } else if($mes == 07){
            $mes_escrito = "Julio";
          } else if($mes == 8){
            $mes_escrito = "Agosto";
          } else if($mes == 9){
            $mes_escrito = "Septiembre";
          } else if($mes == 10){
            $mes_escrito = "Octubre";
          } else if($mes == 11){
            $mes_escrito = "Noviembre";
          } else{
            $mes_escrito = "Diciembre";
          }
          $hora = date('H:i:s',strtotime($dato));
          $horas = substr($hora,0,2); 
        ?>
        <div class="col-md-3" style="margin-left:0px;">
            <div class="text-center date-body" style="width:150px">
              <label for="" class="date-title">Próxima cita</label>
              <div class="date-content">
                <p class="dia">{{$dia}}</p>
                <hr class="nomargin"/>
                <p class="nomargin"><strong>{{$mes_escrito}}</strong></p>
                <p class="nomargin"><strong>{{$horas}}:00</strong></p>
              </div>
            </div>
        </div>
</div>


</body>
</html>