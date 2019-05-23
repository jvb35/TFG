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
            margin-left: 200px;
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
                background-size: 90% 73%;
            }
            

            .gato{
                width: 150px;
                height: 120px;
                float: right;
                margin-right: 200px;
                margin-top: 18px;
            
            }

        }

    </style>

</head>
      
    @extends('layout')
    
    @section('content')

    
    <div class="panel-login">
        @if(isset(Auth::user()->email))  
          <script>window.location="/main/successlogin";</script>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>{{ $message }} </strong>
        </div>
        @endif
        @if(count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>

          </div>
        @endif
    <form class="form-horizontal" action="{{url('/main/checklogin')}}" method="POST">
    {{ csrf_field()}}
    {{ method_field('POST')}}
        <div class="foto"> <img src="/images/gato.png" class="gato"> </div>
        <div class="row" style="width: 1200px;">
            <div class="col-md-12 col-md-offset-7">
                <div class="panel panel-default" style="margin-left: 650px; margin-right: 100px; margin-bottom: 200px;">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label><strong>Enter Email</strong></label>
                            <input type="email" name="email" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label><strong>Enter Password</strong></label>
                            <input type="password" name="password" class="form-control"/>
                        </div>

                        <div class="from-group">
                            <input type="submit" name="login" class="btn btn-primary" value="Login" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

          


	<script>
        window.onload = function() {
            document.getElementById('login').className = 'nav-item active';
        };
    </script>

    @endsection