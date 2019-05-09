<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

.linea {
    height: 5px;
    background-color: blue;
}



.profile-header-container{
    margin: 0 auto;
    text-align: center;
}

.profile-header-img {
    padding: 54px;
}

.profile-header-img > a > img.img-circle {
    width: 100px;
    height: 100px;
    border: 2px solid #51D2B7;
}

.profile-header {
    margin-top: 43px;
}

/**
* Ranking component
*/
.rank-label-container {
    margin-top: -19px;
    /* z-index: 1000; */
    text-align: center;
}

.label.label-default.rank-label {
    background-color: rgb(81, 210, 183);
    padding: 5px 10px 5px 10px;
    border-radius: 27px;
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
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{$mascota->propietario}}
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

	<div class="row">
		<div class="col-md-6">
			<h3> Datos personales</h3>		
			<hr class="linea">
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Nombre</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="nombre" id="nombre"  value="{{$persona->nombre}}" disabled/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Fecha de Nacimiento</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-birthday-cake" ></i></span>
						<input type="date" class="form-control" name="fecha_nac" id="fecha_nac" value="{{$persona->fecha_nac}}" disabled/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Teléfono</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone" ></i></span>
						<input type="text" class="form-control" name="telefono" id="telefono" value="{{$persona->telefono}}" disabled/>
					</div>
				</div>
			</div>

            <div class="form-group">
				<label for="email" class="cols-sm-2 control-label">Correo</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="correo" id="correo"  value="{{$persona->correo}}" disabled/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Dirección</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building" ></i></span>
						<input type="text" class="form-control" name="direccion" id="direccion" value="{{$persona->direccion}}" disabled/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">País</label>
				<div class="cols-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-flag" ></i></span>
						<input type="text" class="form-control" name="pais" id="pais" value="{{$persona->pais}}" disabled/>
					</div>
				</div>
			</div>


			<br>

		</div>
		<div class="col-md-6">
			<h3> Mascotas asociadas </h3>
			<hr class="linea">
			<div class="row">
			@foreach ($mascotas as $mascota)
				<div class="col-sm-3">
					<div class="profile-header-img" style="margin-top: -40px;">
							<a href="/admin-menu/mascotas/editar/{{$mascota->id}}"><img class="img-circle" src="/images/{{$mascota->nombre}}.png" /></a>
					</div>
				</div>
			@endforeach

			</div>

		</div>
	</div>
</div>




</body>
</html>