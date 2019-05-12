<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
    .user-row {
        margin-bottom: 14px;
    }

    .user-row:last-child {
        margin-bottom: 0;
    }

    .dropdown-user {
        margin: 13px 0;
        padding: 5px;
        height: 100%;
    }

    .dropdown-user:hover {
        cursor: pointer;
    }

    .table-user-information > tbody > tr {
        border-top: 1px solid rgb(221, 221, 221);
    }

    .table-user-information > tbody > tr:first-child {
        border-top: 0;
    }


    .table-user-information > tbody > tr > td {
        border-top: 0;
    }
    .toppad
    {margin-top:30px;
    }


    </style>

</head>

@extends('panel-admin')
@section('content')

<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" action="{{url('/admin-menu/mascotas/save/{id}')}}" role="form" method="POST">
{{ csrf_field()}}
{{ method_field('POST')}}
<div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xs-offset-0 col-sm-offset-0 toppad" >
            <div class="panel panel-info" style="margin-left: 40px;">
              <div class="panel-heading">
                <h3 class="panel-title">{{$mascota->nombre}}</h3>
              </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3" align="center"> <img alt="User Pic" src="/images/{{$mascota->nombre}}.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="nombre" id="nombre" class="form-control" value="{{$mascota->nombre}}" disabled></td>
                      </tr>
                      <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="{{$mascota->fecha_nac}}" disabled></td>
                      </tr>
                      <tr>
                        <td>Peso:</td>
                        <td><input type="text" name="peso" id="peso" class="form-control" value="{{$mascota->peso}}" disabled></td>
                      </tr>
                      <tr>
                        <td>Raza:</td>
                        <td><input type="text" name="raza" id="raza" class="form-control" value="{{$mascota->raza}}" disabled></td>
                      </tr>
                      <tr>
                        <td>Especie:</td>
                        <td><input type="text" name="especie" id="especie" class="form-control" value="{{$mascota->especie}}" disabled></td>
                      </tr>
                      <tr>
                        <td>Propietario:</td>
                        <td><input type="text" name="propietario" id="propietario" class="form-control" value="{{$mascota->propietario}}" disabled></td>
                      </tr>
                      <tr>
                        <td>Chip:</td>
                        <td><input type="text" name="chip" id="chip" class="form-control" value="{{$mascota->chip}}" disabled></td>
                      </tr>
                        <td>Num. Pasaporte:</td>
                        <td><input type="number" name="num_pasaporte" id="num_pasaporte" class="form-control" value="{{$mascota->num_pasaporte}}" disabled></td>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>

                  <ul>                     
                    <li style="list-style:none; float:left;">
                      <button style="text-align:left; display:none; margin-left: 10px;" id="oculto" class="btn btn-primary">Guardar cambios</button>
                    </li>
                  </ul>

                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Volver atrás" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary" href="/admin-menu/mascotas/ver"><i class="glyphicon glyphicon-circle-arrow-left"></i></a>
                        <span class="pull-right">
                            <a data-original-title="Editar mascota" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning" onclick="bloquear()" ><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Eliminar mascota" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            <a data-original-title="Historial mascota" data-toggle="tooltip" type="button" class="btn btn-info" onclick="historial({{$mascota->id}})"><i class="glyphicon glyphicon-folder-open"></i></a>
                        </span>
                </div>
            
          </div>
        </div>
        
    </div>
    </form>

    <script>
      function bloquear() {
        document.getElementById("nombre").disabled = false;
        document.getElementById("fecha_nac").disabled = false;
        document.getElementById("peso").disabled = false;
        document.getElementById("raza").disabled = false;
        document.getElementById("especie").disabled = false;
        document.getElementById("propietario").disabled = false;
        document.getElementById("chip").disabled = false;
        document.getElementById("num_pasaporte").disabled = false;
        document.getElementById("oculto").style.display = 'block';

      }

      function actualizarMascota(id){
        window.location.href="/admin-menu/mascotas/save/" + id;
      }

      function historial(id){
        window.location.href="/admin-menu/mascotas/historial/" + id;
      }

    </script>


@endsection