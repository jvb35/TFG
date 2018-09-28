<head>
    <style>
        .panel-login { 
            background: url(/images/fondo_login.png) no-repeat center center; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: 80% 90%;
            margin-top: 150px;
        }

        .panel-default {
            opacity: 0.9;
            margin-top:170px;

        }
        .form-group.last { margin-bottom:0px; }


        @media (min-width: 399px){
            .gato{
                width: 150px;
                height: 120px;
                float: right;
                margin-right: 70px;
                margin-left: 130px;
                margin-top: -60px;
        
            }

            .panel-default{ 
                margin-right: 75px;
            }
        }


        @media (min-width: 600px){
            .row{
                margin-right: 30px;
                margin-left: 200px;
            }

            .gato{
                width: 150px;
                height: 120px;
                float: right;
                margin-right: 140px;
                margin-top: -60px;
        
            }

            .col-md-offset-7{
                margin-bottom: 100px;
            }

            .panel-default{ 
                margin-right: 80px;
                margin-left: 100px;
            }

            .panel {
                margin-bottom: 80px;
            }
        }

        @media (min-width: 991px){
            .col-md-4{
                margin-left: 450px;
                margin-right: -30px;
                width: 49%;
            }
        }



        @media (min-width: 1200px) {
            .panel-login { 
                background: url(/images/fondo_login.png) no-repeat center center; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: 80% 90%;
                margin-top: 150px;
            }
            

            .gato{
                width: 150px;
                height: 120px;
                float: right;
                margin-right: 200px;
                margin-top: -60px;
            
            }

            
            .row{
                margin-right: 100px;
                padding-bottom: 60px;
            }

            .panel-default {
                margin-top: 70px;
                margin-right: 50px;
                margin-left: 0px;
            }
        }

    </style>

</head>
      
    @extends('layout')
    
    @section('content')

    
    <div class="panel-login">
        <div class="foto"> <img src="/images/gato.png" class="gato"> </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-lock"></span> Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">
                                Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"/>
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-sm" onclick="location.href='/login/mascota';">
                                    Sign in</button>
                                     <button type="reset" class="btn btn-default btn-sm">
                                    Reset</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        Not Registred? <a href="http://www.jquery2dotnet.com">Register here</a></div>
                </div>
            </div>
        </div>
    </div>

          


    <script>
        window.onload = function() {
            document.getElementById('zona-clientes').className = 'active';
        };
    </script>

    @endsection