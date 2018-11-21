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
            <tr>
                <th scope="row">1</th>
                <td class="text-center">Domino</td>
                <td class="text-center">Jordi Valls</td>
                <td class="text-center">675837472</td>
                <td class="text-center">
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td class="text-center">Neska</td>
                <td class="text-center">Aila Valls</td>
                <td class="text-center">654332124</td>
                <td class="text-center">
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td class="text-center">Asha</td>
                <td class="text-center">Zaida Berenguer</td>
                <td class="text-center">657384098</td>
                <td class="text-center">
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td class="text-center">Boby</td>
                <td class="text-center">Dani Rovira</td>
                <td class="text-center">687990874</td>
                <td class="text-center">
                    <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                </td>
            </tr>
            </tbody>
        </table>

        
    </section>

@endsection