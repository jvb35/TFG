<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>      

    <style>
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
</head>

@extends('panel-admin')
@section('content')

<div class="container">
	<div class="row">

		<section class="content">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='/admin-menu/mascotas/historial/añadir'">Añadir</button>
                            </div>
                        </div>
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-filter" data-target="Realizada">Realizada</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="Pendiente">Pendiente</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="Cancelada">Cancelada</button>
								<button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="col-md-3 col-xs-3 text-center">Consulta</th>
                                <th class="col-md-2 col-xs-2 text-center">Detalles</th>
                                <th class="col-md-2 col-xs-2 text-center">Estado</th>
                                <th class="col-md-2 col-xs-2 text-center">Fecha</th>
                                <th class="col-md-10 col-xs-10 text-center"><em class="fa fa-cog"></em></th>
                            </tr>
                            </thead>
								<tbody>
									<tr data-status="Realizada">
                                        <th scope="row">1</th>
                                        <td class="text-center">Vacuna lesmaniosis</td>
                                        <td class="text-center"><a  data-toggle="modal" data-target="#miModal">Ver</a></td>
                                        <td class="text-center"><span class="Realizada">Realizada</span></td>
                                        <td class="text-center"><span class="media-meta pull-right">Febrero 13, 2016</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-default" href="/admin-menu/mascotas/historial/editar"><em class="fa fa-pencil"></em></a>
                                            <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                        </td>
									</tr>
									<tr data-status="Pendiente">
                                        <th scope="row">2</th>
                                        <td class="text-center">Peluqueria</td>
                                        <td class="text-center"><a href="">Ver</a></td>
                                        <td class="text-center"><span class="Pendiente">Pendiente</span></td>
                                        <td class="text-center"><span class="media-meta pull-right">Febrero 13, 2016</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-default" href="/admin-menu/mascotas/edit"><em class="fa fa-pencil"></em></a>
                                            <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                        </td>
									</tr>
									<tr data-status="Cancelada">
                                        <th scope="row">3</th>
                                        <td class="text-center">Vacuna lesmaniosis</td>
                                        <td class="text-center"><a href="">Ver</a></td>
                                        <td class="text-center"><span class="Cancelada">Cancelada</span></td>
                                        <td class="text-center"><span class="media-meta pull-right">Febrero 13, 2016</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-default" href="/admin-menu/mascotas/edit"><em class="fa fa-pencil"></em></a>
                                            <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                        </td>
									</tr>
									<tr data-status="Realizada">
                                        <th scope="row">4</th>
                                        <td class="text-center">Vacuna rabia</td>
                                        <td class="text-center"><a href="">Ver</a></td>
                                        <td class="text-center"><span class="Realizada">Realizada</span></td>
                                        <td class="text-center"><span class="media-meta pull-right">Febrero 13, 2016</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-default" href="/admin-menu/mascotas/edit"><em class="fa fa-pencil"></em></a>
                                            <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                        </td>
									</tr>
									<tr data-status="Pendiente">
                                        <th scope="row">5</th>
                                        <td class="text-center">Revisión</td>
                                        <td class="text-center"><a href="">Ver</a></td>
                                        <td class="text-center"><span class="Pendiente">Pendiente</span></td>
                                        <td class="text-center"><span class="media-meta pull-right">Febrero 13, 2016</span></td>
                                        <td class="text-center">
                                            <a class="btn btn-default" href="/admin-menu/mascotas/edit"><em class="fa fa-pencil"></em></a>
                                            <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                        </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
</div>

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Añadir cita</h4>
			</div>
			<div class="modal-body">
                <label for="">Nombre mascota</label>
                <input type="text" class="form-control" name="nombre_mascota" value="Neska" placeholder="Introduza el nombre de la mascota" /><br /><br />
                <label for="">Consulta</label>
                <input type="text" class="form-control" name="nombre_mascota" value="Vacuna lesmaniosis" placeholder="Introduza el nombre de la mascota" /><br /><br />
                <label for="">Descripcion</label>
                <input type="textarea" class="form-control" name="nombre_mascota" placeholder="Introduza el nombre de la mascota" /><br /><br />
                <label for="">Estado</label>
                <input type="text" class="form-control" name="nombre_mascota" value="Realizada" placeholder="Introduza el nombre de la mascota" /><br /><br />
                <label for="">Propietario</label>
                <input type="text" class="form-control" name="propietario" value="Jordi Valls" placeholder="Introduza el tipo de consulta" /><br /><br />
                <label for="">Teléfono</label>
                <input type="number" class="form-control" name="telefono" value="608550850" placeholder="Introduza el tipo de consulta" /><br /><br />
                <label for="">Fecha</label>
                <input type="date" class="form-control" name="start_date" value="23/02/2019" class="date" placeholder="Enter start date" /><br /><br />

			</div>
		</div>
	</div>
</div>


@endsection