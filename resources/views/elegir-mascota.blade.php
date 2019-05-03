<head>
    <link rel="stylesheet" href="<?php echo asset('css/estilos.css')?>" type="text/css">
</head>

@extends('layout')
    
@section('content')

<div class="container">
    <h1 class="titulo"> ¿Qué mascota desea consultar? </h1>
	<div class="row">
        @foreach($mascotas as $mascota)
	    <div class="col-sm-3">
            <div class="profile-header-container">   
                <div class="profile-header-img">
                    <a href="/info/{{$mascota->id}}"><img class="img-circle" src="/images/{{$mascota->nombre}}.png" /></a>
                    <!-- badge -->
                    <div class="rank-label-container">
                        <span class="label label-default rank-label">{{$mascota->nombre}}</span>
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
	</div>
</div>