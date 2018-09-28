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
                <th class="col-md-5 col-xs-5">Nombre</th>
                <th class="col-md-4 col-xs-4">Propietario</th>
                <th class="col-md-3 col-xs-3">Teléfono</th>
            </tr>
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Domino</td>
                <td>Jordi Valls</td>
                <td>675837472</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Neska</td>
                <td>Aila Valls</td>
                <td>654332124</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Asha</td>
                <td>Zaida Berenguer</td>
                <td>657384098</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Boby</td>
                <td>Dani Rovira</td>
                <td>687990874</td>
            </tr>
            </tbody>
        </table>

        
    </section>

@endsection