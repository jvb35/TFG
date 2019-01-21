<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    

    <style>

    </style>

</head>

@extends('panel-admin')
@section('content')

<div class="container">
	<div class="row">   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <table class="table table-striped">
        <thead>
          <tr>
              <th>Temas</th>
              <th>Fecha publicación</th>
              <th>Editar-Eliminar</th>        
            </tr>
          </thead>
          <tbody>
            <tr>
                <td><a href="" target="_blank">Concurso canino</a><br/>Antonio García<br/><i class="fa fa-map-marker"></i> La Nucía<br/><i class="fa fa-phone"></i> 675847561<br/></td>
                <td>Julio 28 - 30, 2019</td>
                <td>
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            <tr>
                <td><a href="" target="_blank">Curso de adiestramiento</a><br/>Jose Gonzalez<br/><i class="fa fa-map-marker"></i> Altea<br/><i class="fa fa-phone"></i> 675847561<br/></td>
                <td>Abril 23, 2019</td>
                <td>
                    <a class="btn btn-default" disabled><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" disabled><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            <tr>
                <td><a href="" target="_blank">Perro perdido</a><br/>Rosa Pérez<br/><i class="fa fa-map-marker"></i> Benidorm<br/><i class="fa fa-phone"></i> 675847561<br/></td>
                <td>Marzo 24, 2019</td>
                <td>
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            <tr>
                <td><a href="" target="_blank">Adopción de cachorros</a><br/>Rosa Pérez<br/><i class="fa fa-map-marker"></i> Albir<br/><i class="fa fa-phone"></i> 675847561<br/></td>
                <td>Febrero 2, 2019</td>
                <td>
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            <tr>
                <td><a href="" target="_blank">Gato perdido</a><br/>Jose Gonzalez<br/><i class="fa fa-map-marker"></i> Polop<br/><i class="fa fa-phone"></i> 675847561<br/></td>
                <td>Enero 20, 2019</td>
                <td>
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>

        </tbody>
      </table>
     </div>

    </div>

   </div>





@endsection