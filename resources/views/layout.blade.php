<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clinica Veterinaria</title>
        <link rel="shortcut icon" href="/images/logo_mini.jpg">

        <!-- Fonts -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            .navbar-default {
            background-color: #1b4f84;
            border-color: #4d8fc8;
            }
            .navbar-default .navbar-brand {
            color: #ffffff;
            }
            .navbar-default .navbar-brand:hover,
            .navbar-default .navbar-brand:focus {
            color: #000000;
            }
            .navbar-default .navbar-text {
            color: #ffffff;
            }
            .navbar-default .navbar-nav > li > a {
            color: #ffffff;
            }
            .navbar-default .navbar-nav > li > a:hover,
            .navbar-default .navbar-nav > li > a:focus {
            color: #000000;
            }
            .navbar-default .navbar-nav > .active > a,
            .navbar-default .navbar-nav > .active > a:hover,
            .navbar-default .navbar-nav > .active > a:focus {
            color: #000000;
            background-color: #4d8fc8;
            }
            .navbar-default .navbar-nav > .open > a,
            .navbar-default .navbar-nav > .open > a:hover,
            .navbar-default .navbar-nav > .open > a:focus {
            color: #000000;
            background-color: #4d8fc8;
            }
            .navbar-default .navbar-toggle {
            border-color: #4d8fc8;
            }
            .navbar-default .navbar-toggle:hover,
            .navbar-default .navbar-toggle:focus {
            background-color: #4d8fc8;
            }
            .navbar-default .navbar-toggle .icon-bar {
            background-color: #ffffff;
            }
            .navbar-default .navbar-collapse,
            .navbar-default .navbar-form {
            border-color: #ffffff;
            }
            .navbar-default .navbar-link {
            color: #ffffff;
            }
            .navbar-default .navbar-link:hover {
            color: #000000;
            }

            @media (max-width: 767px) {
            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: #ffffff;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                color: #000000;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
                color: #000000;
                background-color: #4d8fc8;
            }
            }

        </style>
        
    </head>
    <body>


            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <img class="logo" src="/images/logo.png" alt="Clínica Veterinaria" style="width: 160px;height: 52px;">
                  </div>
              
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="#">HOME</a></li>
                      <li><a href="#">QUIENES SOMOS</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">SERVICIOS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Cirugía</a></li>
                          <li><a href="#">Peluquería</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>
                      <li><a href="#">CONTACTO</a></li>
                      <li id="zona-clientes"><a href="/login">ZONA CLIENTES</a></li>
                
                      
                      
                    </ul>
                  </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-collapse -->
                </nav>
                @yield('content')

    </body>
</html>


