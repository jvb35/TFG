<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="/images/logo_mini.jpg" type="image/png">
	<title>Clinica Veterinaria</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/codigo.js"></script>
    <script src="js/bootstrap-table-pagination.js"></script>
    <script src="js/pagination.js"></script>
	
    <style>
        body, html {
            height: 100%;
        }

        @media (min-width: 1200px){
            .row{
                margin-left: 200px;
                text-align: center;
                display: flex;
            }

        }
        /**
        * Profile image component
        */
        .profile-header-container{
            margin: 0 auto;
            text-align: center;
        }

        .profile-header-img {
            padding: 54px;
        }

        .profile-header-img > a > img.img-circle {
            width: 150px;
            height: 150px;
            border: 2px solid #51D2B7;
        }

        .profile-header {
            margin-top: 43px;
        }

        /**
        * Ranking component
        */
        .rank-label-container {
            margin-top: -19px;
            /* z-index: 1000; */
            text-align: center;
        }

        .label.label-default.rank-label {
            background-color: rgb(81, 210, 183);
            padding: 5px 10px 5px 10px;
            border-radius: 27px;
        }

        .row{
            margin-top: 100px;
            justify-content:center;

        }

        .titulo{
            margin-top: 150px;
            text-align: center;
        }

    </style>
</head>

<body style="background-color: #ADD8E6 ;">

<div class="container">
    <h1 class="titulo" style="margin-top: 150px;text-align: center;"> ¿Qué mascota desea consultar? </h1>
	<div class="row" style="margin-top: 100px;justify-content:center;">
        @foreach($mascotas as $mascota)
	    <div class="col-sm-3">
            <div class="profile-header-container">   
                <div class="profile-header-img">
                    <a href="/info/{{$mascota->id}}"><img class="img-circle" src="/images/{{$mascota->nombre}}.png" style="width: 150px;height: 150px;border: 2px solid #51D2B7;"/></a>
                    <!-- badge -->
                    <div class="rank-label-container">
                        <span class="label label-default rank-label" style="background-color: rgb(81, 210, 183);padding: 5px 10px 5px 10px;border-radius: 27px;">{{$mascota->nombre}}</span>
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
	</div>
</div>

</body>
</html>

