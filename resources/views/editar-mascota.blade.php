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

<div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xs-offset-0 col-sm-offset-0 toppad" >
            <div class="panel panel-info" style="margin-left: 40px;">
              <div class="panel-heading">
                <h3 class="panel-title">Neska</h3>
              </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3" align="center"> <img alt="User Pic" src="/images/yorskhire.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td><input type="text" id="name" class="form-control" value="Neska" disabled></td>
                      </tr>
                      <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><input type="date" id="date" class="form-control" value="" disabled></td>
                      </tr>
                      <tr>
                        <td>Peso:</td>
                        <td><input type="text" id="weight" class="form-control" value="3Kg" disabled></td>
                      </tr>
                      <tr>
                        <td>Raza:</td>
                        <td><input type="text" id="race" class="form-control" value="Yorshkire" disabled></td>
                      </tr>
                      <tr>
                        <td>Propietario</td>
                        <td><input type="text" id="propierty" class="form-control" value="Jordi Valls Beneyto" disabled></td>
                      </tr>
                      <tr>
                        <td>Correo:</td>
                        <td><input type="text" id="email" class="form-control" value="jordivalls@hotmail.com" disabled></td>
                      </tr>
                        <td>Teléfono</td>
                        <td><input type="number" id="telephone" class="form-control" value="608550850" disabled></td>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>

                  <ul>
                    <li style="list-style:none; float:left;">
                    <button style="text-align:left;" class="btn btn-primary">Ver Historial</button>
                    </li>
                     
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
                        </span>
                </div>
            
          </div>
        </div>
    </div>


    <script>
      function bloquear() {
        document.getElementById("name").disabled = false;
        document.getElementById("date").disabled = false;
        document.getElementById("weight").disabled = false;
        document.getElementById("race").disabled = false;
        document.getElementById("propierty").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("telephone").disabled = false;
        document.getElementById("oculto").style.display = 'block';

      }

    </script>


@endsection