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

    <section class="content-header">
        <h1>
            Nuestras mascotas
        </h1>
    </section>
      
    <!-- Main content -->
    <section class="content">
        <div class="form-group pull-left">
            <input type="text" class="search form-control" placeholder="Buscador">
        </div>
        <span class="counter pull-left"></span>
        <table id="tabla-mascotas" class="table table-hover table-bordered results" style="background-color:lightgrey;">
            <thead>
            <tr>
                <th></th>
                <th class="col-md-3 col-xs-3 text-center">Nombre</th>
                <th class="col-md-4 col-xs-4 text-center">Propietario</th>
                <th class="col-md-3 col-xs-3 text-center">Teléfono</th>
                <th class="col-md-5 col-xs-5 text-center"><em class="fa fa-cog"></em></th>
            </tr>
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
            </thead>
            <tbody>
            <?php
                $id = 0;
            ?>
            @foreach ($mascotas as $mascota)
                    
            <?php 
                $persona = \App\Persona::find($mascota->persona_id);
                $id++;
            ?>
            <tr>
                <th scope="row">{{$id}}</th>
                <td class="text-center">{{$mascota->nombre}}</td>
                <td class="text-center">{{$mascota->propietario}}</td>
                <td class="text-center">{{$persona->telefono}}</td>
                <td class="text-center">
                    <a class="btn btn-default" onclick="editarMascota({{$mascota->id}});"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger" onclick="eliminarMascota({{$mascota->id}});"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div class="paginate">
            {{$mascotas->links()}}
        </div>

        
    </section>

    <script>
        function eliminarMascota(id){
            r= confirm('¿Esta seguro de desea elmininar esto?');
            if(r == true){
                window.location.href="/admin-menu/mascotas/borrar/" + id;
            }else{
                window.location.href="/admin-menu/personas/ver";
            }
        }

        function editarMascota(id){
            window.location.href="/admin-menu/mascotas/editar/" + id;
        }
    </script>

@endsection