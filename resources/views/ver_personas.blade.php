<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>
    

    <style>

        .results tr[visible='false'],
        .no-result{
            display:none;
        }

        .results tr[visible='true']{
            display:table-row;
        }

        .counter{
            padding:8px; 
            color:#ccc;
        }
    </style>

</head>

@extends('panel-admin')
@section('content')

@if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success')}}</p>
    </div>
@endif
    <section class="content-header">
        <h1>
            Nuestros clientes
        </h1>
    </section>
      
    <!-- Main content -->
    <section class="content">
        <?php
            $id = 0;
        ?>
        <div class="form-group pull-left">
            <input type="text" class="search form-control" placeholder="Buscador">
        </div>
        <span class="counter pull-left"></span>
        <table id="tabla-mascotas" class="table table-hover table-bordered results" style="background-color:lightblue;">
            <thead>
            <tr>
                <th></th>
                <th class="col-md-3 col-xs-3 text-center">Nombre</th>
                <th class="col-md-4 col-xs-4 text-center">Correo</th>
                <th class="col-md-3 col-xs-3 text-center">Teléfono</th>
                <th class="col-md-3 col-xs-3 text-center"><em class="fa fa-cog"></em></th>
            </tr>
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
            </thead>

            <tbody>

            @foreach ($personas as $persona)
            <?php
                $id++;
            ?>
            <tr>
                <th scope="row">{{$id}}</th>
                <td class="text-center">{{$persona->nombre}}</td>
                <td class="text-center">{{$persona->correo}}</td>
                <td class="text-center">{{$persona->telefono}}</td>
                <td class="text-center">
                    <a class="btn btn-default"  onclick="editarPersona({{$persona->id}});"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" onclick="eliminarPersona({{$persona->id}});"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div class="paginate" style="">
            {{$personas->links()}}
        </div>

    </section>

    <script>
        function eliminarPersona(id){
            r= confirm('¿Esta seguro de desea elmininar esto?');
            if(r == true){
                window.location.href="/admin-menu/personas/borrar/" + id;
            }else{
                window.location.href="/admin-menu/personas/ver";
            }
        }

        function editarPersona(id){
            window.location.href="/admin-menu/personas/editar/" + id;
        }
    </script>

@endsection