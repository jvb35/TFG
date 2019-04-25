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
            @foreach ($temas as $tema)
            <tr>
                <td><a href="/admin-menu/foro/ver/{{$tema->id}}">{{$tema->nombre}}</a><br/>{{$tema->autor}}<br/><i class="fa fa-map-marker"></i>{{$tema->direccion}}<br/><i class="fa fa-phone"></i>{{$tema->telefono}}<br/></td>
                <td>{{$tema->fecha}}</td>
                <td>
                    <a class="btn btn-default" onclick="editarTema({{$tema->id}});"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" onclick="eliminarTema({{$tema->id}});"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
     </div>

    </div>

   </div>

    <script>
        function eliminarMascota(id){
            r= confirm('¿Esta seguro de desea elmininar esto?');
            if(r == true){
                window.location.href="/admin-menu/foro/borrar/" + id;
            }else{
                window.location.href="/admin-menu/foro/ver";
            }
        }

        function editarMascota(id){
            window.location.href="/admin-menu/foro/editar/" + id;
        }
    </script>




@endsection