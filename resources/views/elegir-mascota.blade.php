<head>
    <link rel="stylesheet" href="<?php echo asset('css/estilos.css')?>" type="text/css">
</head>

@extends('layout')
    
@section('content')

<div class="container">
    <h1 class="titulo"> ¿Qué mascota desea consultar? </h1>
	<div class="row">
	    <div class="col-sm-3">
        <div class="profile-header-container">   
    		<div class="profile-header-img">
                <a href="/admin-menu"><img class="img-circle" src="/images/Dalmata.png" /></a>
                <!-- badge -->
                <div class="rank-label-container">
                    <span class="label label-default rank-label">Domino</span>
                </div>
            </div>
        </div> 
        </div>
        <div class="col-sm-3">
        <div class="profile-header-container">   
    		<div class="profile-header-img">
                <a href="/admin-menu"><img class="img-circle" src="/images/yorskhire.png" /></a>
                <!-- badge -->
                <div class="rank-label-container">
                    <span class="label label-default rank-label">Neska</span>
                </div>
            </div>
        </div> 
        </div>

        <div class="col-sm-3">
            <div class="profile-header-container">   
                <div class="profile-header-img">
                    <a href="/admin-menu"><img class="img-circle" src="/images/asha.JPG" /></a>
                    <!-- badge -->
                    <div class="rank-label-container">
                        <span class="label label-default rank-label">Asha</span>
                    </div>
                </div>
            </div> 
        </div>

	</div>
</div>