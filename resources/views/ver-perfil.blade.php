<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>
    

    <style>

        input.hidden {
            position: absolute;
            left: -9999px;
        }

        #profile-image1 {
        cursor: pointer;
        width: 100px;
        height: 100px;
        border:2px solid #03b1ce;
        }
        .tital{ font-size:16px; font-weight:500;}
        .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}
    </style>

</head>

@extends('panel-admin')
@section('content')

@if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success')}}</p>
    </div>
@endif

<div class="container">
	<div class="row">
    <br>
    <br>
       <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">  
                    <h4 >Ficha técnica</h4>
                </div>
            
                <div class="panel-body">
                    <div class="box box-info">
                
                        <div class="box-body">
                            <div class="col-sm-6">
                                <div  align="center"> 
                                    <img alt="{{Auth::user()->name}}" src="/images/personal/{{ Auth::user()->filename}}" id="profile-image1" class="img-circle img-responsive"> 
                                </div>
                                <br>

                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:#00b1b1;">{{Auth::user()->name}} </h4></span>
                                <span><p>{{$persona->especialidad}}</p></span>            
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">
            
                    
                            <div class="col-sm-5 col-xs-6 tital " >Nombre:</div><div class="col-sm-7 col-xs-6 ">{{$persona->nombre}}</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Correo:</div><div class="col-sm-7"> {{$persona->correo}}</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Fecha nacimiento:</div><div class="col-sm-7"> {{$persona->fecha_nac}}</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Especialidad:</div><div class="col-sm-7">{{$persona->especialidad}}</div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Teléfono:</div><div class="col-sm-7">{{$persona->telefono}}</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>
                            <br>
                        </div>
                    </div>      
                </div> 
            </div>
        </div>
        <div class="col-md-6">
            <form class="form-horizontal" action="{{url('/admin-menu/ver-perfil/cambiar')}}" method="POST">
            {{ csrf_field()}}
            {{ method_field('POST')}}
                <div id="passwordreset" style="margin-top:50px" class="mainbox col-md-10 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Crear nueva contraseña</div>
                        </div>                     
                        <div class="panel-body">
                                <div class="form-group">
                                    <label for="email" class=" control-label col-sm-3">Contraseña actual</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password_actual" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class=" control-label col-sm-3">Nueva contraseña</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class=" control-label col-sm-3">Repita contraseña</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password2" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                 
                                    <div class="  col-sm-offset-3 col-sm-9">
                                    <input type="submit" class="btn btn-primary" value="Crear">
                                    </div>
                                </div>                             
                        </div>
                    </div>
                </div>
            </form>             
        </div>
    </div>
</div>

@endsection