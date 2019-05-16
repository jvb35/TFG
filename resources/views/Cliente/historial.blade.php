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

        body {
            font-family: 'Open Sans', sans-serif;
            color: #353535;
        }
        .content h1 {
            text-align: center;
        }
        .content .content-footer p {
            color: #6d6d6d;
            font-size: 12px;
            text-align: center;
        }
        .content .content-footer p a {
            color: inherit;
            font-weight: bold;
        }

        /*	--------------------------------------------------
            :: Table Filter
            -------------------------------------------------- */
        .panel {
            border: 1px solid #ddd;
            background-color: #fcfcfc;
        }
        .panel .btn-group {
            margin: 15px 0 30px;
        }
        .panel .btn-group .btn {
            transition: background-color .3s ease;
        }
        .table-filter {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }
        .table-filter tbody tr:hover {
            cursor: pointer;
            background-color: #eee;
        }
        .table-filter tbody tr td {
            padding: 10px;
            vertical-align: middle;
            border-top-color: #eee;
        }
        .table-filter tbody tr.selected td {
            background-color: #eee;
        }
        .table-filter tr td:first-child {
            width: 38px;
        }
        .table-filter tr td:nth-child(2) {
            width: 35px;
        }
        .ckbox {
            position: relative;
        }
        .ckbox input[type="checkbox"] {
            opacity: 0;
        }
        .ckbox label {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .ckbox label:before {
            content: '';
            top: 1px;
            left: 0;
            width: 18px;
            height: 18px;
            display: block;
            position: absolute;
            border-radius: 2px;
            border: 1px solid #bbb;
            background-color: #fff;
        }
        .ckbox input[type="checkbox"]:checked + label:before {
            border-color: #2BBCDE;
            background-color: #2BBCDE;
        }
        .ckbox input[type="checkbox"]:checked + label:after {
            top: 3px;
            left: 3.5px;
            content: '\e013';
            color: #fff;
            font-size: 11px;
            font-family: 'Glyphicons Halflings';
            position: absolute;
        }
        .table-filter .star {
            color: #ccc;
            text-align: center;
            display: block;
        }
        .table-filter .star.star-checked {
            color: #F0AD4E;
        }
        .table-filter .star:hover {
            color: #ccc;
        }
        .table-filter .star.star-checked:hover {
            color: #F0AD4E;
        }
        .table-filter .media-photo {
            width: 35px;
        }
        .table-filter .media-body {
            display: block;
            /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
        }
        .table-filter .media-meta {
            font-size: 11px;
            color: #999;
        }
        .table-filter .media .title {
            color: #2BBCDE;
            font-size: 14px;
            font-weight: bold;
            line-height: normal;
            margin: 0;
        }
        .table-filter .media .title span {
            font-size: .8em;
            margin-right: 20px;
        }
        .Realizada {
            color: #5cb85c;
        }
        .Pendiente {
            color: #f0ad4e;
        }
        .Cancelada {
            color: #d9534f;
        }
        .table-filter .media .summary {
            font-size: 14px;
        }

        .media-bodys{
            width: auto;
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
            <li><a href="/login"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesión</a></li>
          </ul>
        </div>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
	<div class="row">

		<section class="content">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="pull-left">
                        </div>
						<div class="pull-right">

						</div>
						<div class="table-container">
							<table class="table table-filter">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="col-md-3 col-xs-3 text-center">Consulta</th>
                                <th class="col-md-3 col-xs-3 text-center">Detalles</th>
                                <th class="col-md-2 col-xs-2 text-center">Estado</th>
                                <th class="col-md-3 col-xs-3 text-center">Fecha</th>
                            </tr>
                            </thead>
								<tbody>
                                <?php
                                    $id1 = 0;
                                ?>
                                    @foreach ($consultas as $consulta)
                                    <?php
                                        $id1++;
                                    ?>
									<tr data-status="{{$consulta->estado}}">
                                        <th scope="row">{{$id1}}</th>
                                        <td class="text-center">{{$consulta->nombre}}</td>
                                        <td class="text-center"><a  data-toggle="modal" data-target="#miModal">Ver</a></td>

                                        <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">Detalles</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="">Nombre mascota</label>
                                                        <input type="text" class="form-control" name="nombre_mascota" value="{{$mascota->nombre}}" readonly="readonly" /><br /><br />
                                                        <label for="">Consulta</label>
                                                        <input type="text" class="form-control" name="nombre_mascota" value="{{$consulta->nombre}}" readonly="readonly" /><br /><br />
                                                        <label for="">Descripcion</label>
                                                        <input type="textarea" class="form-control" name="nombre_mascota" value="{{$consulta->descripcion}}" readonly="readonly" /><br /><br />
                                                        <label for="">Estado</label>
                                                        <input type="text" class="form-control" name="nombre_mascota" value="{{$consulta->estado}}" readonly="readonly" /><br /><br />
                                                        <label for="">Propietario</label>
                                                        <input type="text" class="form-control" name="propietario" value="{{$mascota->propietario}}" readonly="readonly" /><br /><br />
                                                        <label for="">Fecha</label>
                                                        <input type="date" class="form-control" name="start_date" value="{{$consulta->fecha}}" class="date" readonly="readonly" /><br /><br />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <td class="text-center"><span class="{{$consulta->estado}}">{{$consulta->estado}}</span></td>
                                        <td class="text-center"><span class="text-center">{{$consulta->fecha}}</span></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
</div>

</body>
</html>